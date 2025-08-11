<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
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
            <button class="add">Add Record</button></a>
            <table border=1>
                <tr>
                    <th>Event Code</th>
                    <th>Event Description</th>
                    <th>Actions</th>
                </tr>
                <?php
                include_once "dbconnection.php";

                $query = "SELECT e.eventCode, e.eventDescription
        FROM event as e";

                $result = $conn->query($query);

                while ($row = $result->fetch_assoc()) {
                    $code = htmlspecialchars($row['eventCode']);
                    $desc = htmlspecialchars($row['eventDescription']);

                    echo "
                        <tr>
                        <td>{$code}</td>
                        <td>{$desc}</td>
                        <td>
                        <button class='editEvent'   data-code='{$code}'>Edit</button>
                        <button class='deleteEvent' data-code='{$code}' data-desc='{$desc}'>Delete</button>
                        </td>
                        </tr>";
                    }
                ?>
            </table>
        </div>
        <div id="collegeModal" class="modal-backdrop" role="dialog" aria-modal="true">
            <div class="modal">
                <button class="modal-close" aria-label="Close"></button>
                <div id="modalContent"></div>
            </div>
        </div>

        <script>
            const addBtn = document.querySelector('.add');
            const editBtns = document.querySelectorAll('.editEvent');
            const deleteBtns = document.querySelectorAll('.deleteEvent');
            const backdrop = document.getElementById('collegeModal');
            const closeBtn = backdrop.querySelector('.modal-close');
            const content = document.getElementById('modalContent');

            // Generic loader
            async function loadIntoModal(url) {
                const html = await fetch(url).then(r => r.text());
                content.innerHTML = html;
                backdrop.classList.add('show');
            }

            // 1) Add
            addBtn.addEventListener('click', e => {
                e.preventDefault();
                loadIntoModal('createEvent.php');
            });

            // 2) Edit
            editBtns.forEach(btn =>
                btn.addEventListener('click', e => {
                    const code = e.currentTarget.dataset.code;
                    loadIntoModal(`updateEvent.php?eventCode=${encodeURIComponent(code)}`);
                })
            );

            // 3) Delete
            deleteBtns.forEach(btn =>
                btn.addEventListener('click', e => {
                    const code = e.currentTarget.dataset.code;
                    const desc = e.currentTarget.dataset.desc;
                    loadIntoModal(`deleteEvent.php?eventCode=${encodeURIComponent(code)}&eventDesc=${encodeURIComponent(desc)}`);
                })
            );

            // 4) Close modal
            function closeModal() {
                backdrop.classList.remove('show');
                content.innerHTML = '';
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

            // 5) Handle “cancel” inside delete form (delegation)
            content.addEventListener('click', e => {
                if (e.target.id === 'cancelDelete') {
                    closeModal();
                }
            });
        </script>
    </div>
</body>

</html>