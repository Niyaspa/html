<!DOCTYPE html>
<html>
<head>
    <title>Organization Management</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { border-collapse: collapse; width: 100%; margin-bottom: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; }
        th { background-color: #f4f4f4; }
        form { margin-bottom: 20px; }
    </style>
</head>
<body>
    <h1>Organization Management</h1>

    <!-- Form to Add Department -->
    <form method="POST">
        <h3>Add Department</h3>
        <input type="text" name="dept_name" placeholder="Department Name" required>
        <button type="submit" name="addDepartment">Add Department</button>
    </form>

    <!-- Form to Add Employee -->
    <form method="POST">
        <h3>Add Employee</h3>
        <input type="text" name="emp_name" placeholder="Employee Name" required>
        <input type="text" name="designation" placeholder="Designation" required>
        <input type="number" name="salary" placeholder="Salary" required>
        <input type="number" name="dept_id" placeholder="Department ID" required>
        <button type="submit" name="addEmployee">Add Employee</button>
    </form>

    <?php
    // Database connection
    $conn = new mysqli("localhost", "root", "", "OrganizationDB");
    if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

    // Add Department
    if (isset($_POST['addDepartment'])) {
        $dept_name = $conn->real_escape_string($_POST['dept_name']);
        echo $conn->query("INSERT INTO department (dept_name) VALUES ('$dept_name')") 
            ? "<p>Department added!</p>" 
            : "<p>Error: $conn->error</p>";
    }

    // Add Employee
    if (isset($_POST['addEmployee'])) {
        $emp_name = $conn->real_escape_string($_POST['emp_name']);
        $designation = $conn->real_escape_string($_POST['designation']);
        $salary = $conn->real_escape_string($_POST['salary']);
        $dept_id = $conn->real_escape_string($_POST['dept_id']);
        echo $conn->query("INSERT INTO employees (emp_name, designation, salary, dept_id) 
                           VALUES ('$emp_name', '$designation', '$salary', '$dept_id')") 
            ? "<p>Employee added!</p>" 
            : "<p>Error: $conn->error</p>";
    }

    // Display Departments
    echo "<h3>Departments</h3>";
    $result = $conn->query("SELECT * FROM department");
    if ($result->num_rows > 0) {
        echo "<table><tr><th>ID</th><th>Name</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>{$row['dept_id']}</td><td>{$row['dept_name']}</td></tr>";
        }
        echo "</table>";
    } else echo "<p>No departments found.</p>";

    // Display Employees
    echo "<h3>Employees</h3>";
    $result = $conn->query("SELECT e.emp_id, e.emp_name, e.designation, e.salary, d.dept_name 
                            FROM employees e 
                            LEFT JOIN department d ON e.dept_id = d.dept_id");
    if ($result->num_rows > 0) {
        echo "<table><tr><th>ID</th><th>Name</th><th>Designation</th><th>Salary</th><th>Department</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>{$row['emp_id']}</td><td>{$row['emp_name']}</td>
                      <td>{$row['designation']}</td><td>{$row['salary']}</td>
                      <td>{$row['dept_name']}</td></tr>";
        }
        echo "</table>";
    } else echo "<p>No employees found.</p>";

    $conn->close();
    ?>
</body>
</html>
