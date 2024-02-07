<?php
session_start();

// Function to add a task to the todo list
function addTask($task) {
    $_SESSION['tasks'];
    array_push($_SESSION['tasks'],$task);
}

// Function to remove a task from the todo list
function removeTask($index) {
    if (isset($_SESSION['tasks'][$index])) 
    {
        unset($_SESSION['tasks'][$index]);
    }
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['task'])) {
        $task = $_POST['task'];
        addTask($task);
    } elseif (isset($_POST['remove'])) {
        $index = $_POST['remove'];
        removeTask($index);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title>
    <style>
       #form1 {
           margin:auto 40%;
       }
    </style>
</head>
<body>

<h2 align="center">Todo List</h2>

<form method="post" id="form1">
    <input type="textbox" height="20" width="10" name="task" placeholder="Enter task">
    <button type="submit">Add Task</button>
</form>

<ul>
    <?php if (isset($_SESSION['tasks'])): ?>
        <?php foreach ($_SESSION['tasks'] as $index => $task): ?>
            <li>
                <?php echo $task; ?>
                <form method="post" id="form2" >
                    <input type="hidden" name="remove" value="<?php echo $index; ?>">
                    <button type="submit">Remove</button>
                </form>
            </li>
        <?php endforeach; ?>
    <?php endif; ?>
</ul>

</body>
</html>