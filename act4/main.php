<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Document</title>
</head>
<body>
    <div id="sidenav">
       
        <h2>Navigation</h2>
            <div><a href="main.php">Accounts</a></div>
            <div><a href="mainCollege.php">Colleges</a></div>
            <div><a href="mainPosition.php">Positions</a></div>
            <div><a href="mainEvent.php">Events</a></div>
            <div><a href="dashboard.php">Dashboard</a></div>
            
    </div>
    <div id="main">
    <div id="table">
    <button class = "add">Add Record</button></a>
    <table border=1>
        <tr>
            <th>Username</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email Address</th>
            <th>Actions</th>
        </tr>
    <?php
    include_once "dbconnection.php";

    $query = "SELECT a.username, a.firstname, a.lastname, a.email
        FROM account as a
        ORDER BY CAST(SUBSTRING(a.username, 5) AS UNSIGNED)";

    $result = $conn->query($query);

    while($row = $result->fetch_assoc()) {
        $first_name = $row['firstname'];
        $last_name = $row['lastname'];
        $email_address = $row['email'];
        $username = $row['username'];
        

        echo "
        <tr>
          <td>{$username}</td>
          <td>{$first_name}</td>
          <td>{$last_name}</td>
          <td>{$email_address}</td>
          <td>
            <button class='view'   data-username='{$username}'>View</button>
            <button class='edit'   data-username='{$username}'>Edit</button>
            <button class='removeBtn' data-username='{$username}' data-firstname='{$first_name}' data-lastname='{$last_name}'>Delete</button>
          </td>
        </tr>
        ";
        
    }
    ?>
    </table>
    </div>

    
<div id="recordModal" class="modal-backdrop" role="dialog" aria-modal="true">
  <div class="modal">
    <button class="modal-close" aria-label="Close"></button>
    <div id="modalContent"></div>
  </div>
</div>
<script>
  const addBtn   = document.querySelector('.add');
  const editButtons = document.querySelectorAll('.edit');
  const viewButtons   = document.querySelectorAll('.view');
  const deleteButtons = document.querySelectorAll('.removeBtn');
  const backdrop = document.getElementById('recordModal');
  const closeBtn = backdrop.querySelector('.modal-close');
  const content  = document.getElementById('modalContent');

  // Fetch & show form
  addBtn.addEventListener('click', e => {
    e.preventDefault();
    fetch('create.php')
      .then(res => res.text())
      .then(html => {
        content.innerHTML = html;
        backdrop.classList.add('show');
      })
      .catch(err => alert('Could not load form: ' + err));
  });

  editButtons.forEach(btn =>
  btn.addEventListener('click', e => {
    const user = e.currentTarget.dataset.username;
    fetch(`update.php?username=${user}`)
      .then(res => res.text())
      .then(html => {
        content.innerHTML = html;
        backdrop.classList.add('show');
      })
      .catch(err => alert('Could not load form: ' + err));
  })
);

deleteButtons.forEach(btn =>
  btn.addEventListener('click', e => {
    const d = e.currentTarget.dataset;
    fetch(`delete.php?username=${d.username}&firstname=${d.firstname}&lastname=${d.lastname}`)
      .then(res => res.text())
      .then(html => {
        content.innerHTML = html;
        backdrop.classList.add('show');
      })
      .catch(err => alert('Could not load form: ' + err));
  })
);

viewButtons.forEach(btn =>
  btn.addEventListener('click', async e => {
    e.preventDefault();
    const user = e.currentTarget.dataset.username;
    const html = await fetch(`profile.php?username=${user}`).then(r => r.text());
    content.innerHTML = html;
    backdrop.classList.add('show');

    // Now that the HTML is in the DOM, grab your data arrays
    const labels  = JSON.parse(content.querySelector('#chartASCUStats').getAttribute('data-labels'));
    const attacks = JSON.parse(content.querySelector('#chartASCUStats').getAttribute('data-attacks'));
    const blocks  = JSON.parse(content.querySelector('#chartASCUStats').getAttribute('data-blocks'));
    const aces    = JSON.parse(content.querySelector('#chartASCUStats').getAttribute('data-aces'));

    console.log('Parsed chart data:', { labels, attacks, blocks, aces });
    // Finally initialize Chart.js on the newly‑inserted canvas
    new Chart(
      content.querySelector('#chartASCUStats').getContext('2d'),
      {
        type: 'bar',
        data: { labels, datasets: [
          { label: 'Attacks', data: attacks },
          { label: 'Blocks',  data: blocks  },
          { label: 'Aces',    data: aces    }
        ]},
         
      }
    );
  })
);

  // Close modal
  function closeModal() {
    backdrop.classList.remove('show');
    content.innerHTML = ''; // clear out for next time
  }
  closeBtn.addEventListener('click', closeModal);
  backdrop.addEventListener('click', e => {
    if (e.target === backdrop) closeModal();
  });
  document.addEventListener('keydown', e => {
    if (e.key === 'Escape' && backdrop.classList.contains('show')) {
      closeModal();
    }
  });
</script>

</div>
</body>
</html>