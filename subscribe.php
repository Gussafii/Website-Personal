<?php
// Menggunakan informasi koneksi database yang sesuai
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "stmik_ids";

// Membuat koneksi ke database
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Memproses form jika disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $tanggal = date("Y-m-d"); // Mendapatkan tanggal saat ini

    // Menyiapkan dan menjalankan query untuk menyimpan data ke database
    $sql = "INSERT INTO subscribe (nama, email, tanggal) VALUES ('$nama', '$email', '$tanggal')";

    if ($conn->query($sql) === TRUE) {
        header("Location: /perhutani/views/index.html");
        exit(); 
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Menutup koneksi ke database
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Perhutani</title>
    <style>/* Reset default margin and padding */
/* Reset default margin and padding */
body, h1, h2, h3, h4, h5, h6, p {
    margin: 0;
    padding: ;
}

/* Set font family and background color */
body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
}

/* Center the form */
form {
    width: 15%;
    margin: 0 auto;
    padding: 60px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);/* Center-align form content */
}

/* Center-align the "Form Subscribe" text */
h2 {
    text-align: center;
}


/* Style form labels and inputs */
label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
}

input[type="text"],
input[type="email"],
input[type="date"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 3px;
    font-size: 14px;
}

/* Style the submit button */
input[type="submit"] {
    background-color: #e6a756;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 3px;
    cursor: pointer;
    font-size: 14px;
}

input[type="submit"]:hover {
    background-color: #df902a;
}

/* Add some spacing between form elements */
br {
    line-height: 20px;
}

/* Additional styling for centering */
.container {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
}

.container form {
    width: 100%;
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}


</style>

</head>
<body>
    <h2>Form Subscribe</h2>
    <form method="post" action="">
        <label for="nama">Nama: </label>
        <input type="text" name="nama" required><br><br>

        <label for="email">Email: </label>
        <input type="email" name="email" required><br><br>

        <label for="tanggal">Tanggal: </label>
        <input type="date" name="tanggal" required><br><br>

        <input type="submit" value="Subscribe">
    </form>
</body>
</html>
