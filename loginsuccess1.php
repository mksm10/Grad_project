<!DOCTYPE html>
<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false) {
    header("Location: index.php");
    exit();
}
?>

<html>

<head>
    <style>
table {
    width: 60%;
    margin: auto;
    background-color: lightgray;
    border: 1px solid black;
    border-collapse: collapse;
}

td {
    border: 1px solid black;
    padding: 1px;
}

input {
    width: 100%;
    box-sizing: border-box;
}
</style>
</head>
<body>
<br><br>

<form action="/FINAL_PROJECT/action_page.php" method="POST">

<table border = 2, style="width:60%", style="margin:auto">
<th colspan="3">Computer Science Project</th>
<tr style="text-align:left;">
    <th  colspan="3">Group Members:<input type="text" style="width: 100px; background-color: lightgray;margin-left: 10px;" ><br>
        Group:<input type="text" style="width: 180px;background-color: lightgray;margin-left: 10px;"><br>
        Number:<input type="text" style="width: 165px;background-color: lightgray;margin-left: 10px;"><br>
        Project Title:<input type="text" style="width: 133px;background-color: lightgray;margin-left: 10px;"></th>
    </tr>

<tr>
    <th style="text-align:left;">Criteria</th>
    <td style="text-align:center;">Developing (0-10)</td>
    <td style="text-align:center;">Accomplished (10-15)</td>
</tr>

<tr>
    <th style="text-align:left;">Articulate Requirements</th>
    <td><input type="text" name="gr" style="text-align:center;" id="gr1a" 
        oninput="
        gr1b.disabled = this.value.length;
        gr1b.style.opacity = this.value.length ? 0 : 1;
        calculateSum();
      ">
    </td>
    <td><input id="gr1b" type="text" name="gr" style="text-align:center;" id="gr1b"
        oninput="
        gr1a.disabled = this.value.length;
        gr1a.style.opacity = this.value.length ? 0 : 1;
        calculateSum();
        ">
        </td>
        </tr>

<tr>
    <th style="text-align:left;">Choose appropriate tools and methods for each task</th>
    <td><input type="text" name="gr" style="text-align:center;" id="gr2a" 
        oninput="
        gr2b.disabled = this.value.length;
        gr2b.style.opacity = this.value.length ? 0 : 1;
        calculateSum();
      ">
    </td>
    <td><input type="text" name="gr" style="text-align:center;" id="gr2b"
        oninput="
        gr2a.disabled = this.value.length;
        gr2a.style.opacity = this.value.length ? 0 : 1;
        calculateSum();
        "></td>
</tr>

<tr>
    <th style="text-align:left;">Give clear and coherent oral presentation</th>
    <td><input type="text" name="gr" style="text-align:center;" id="gr3a"
        oninput="
        gr3b.disabled = this.value.length;
        gr3b.style.opacity = this.value.length ? 0 : 1;
        calculateSum();
        "></td>
    <td><input type="text" name="gr" style="text-align:center;" id="gr3b"
        oninput="
        gr3a.disabled = this.value.length;
        gr3a.style.opacity = this.value.length ? 0 : 1;
        calculateSum();
        "></td>
</tr>

<tr>
    <th style="text-align:left;">Functioned well as a team</th>
    <td><input type="text" name="gr" style="text-align:center;" id="gr4a"
        oninput="
        gr4b.disabled = this.value.length;
        gr4b.style.opacity = this.value.length ? 0 : 1;
        calculateSum();
        "></td>
    <td><input type="text" name="gr" style="text-align:center;"  id="gr4b"
        oninput="
        gr4a.disabled = this.value.length;
        gr4a.style.opacity = this.value.length ? 0 : 1;
        calculateSum();
        "></td>
</tr>

<!-- "Total" Operations -->

<tr>
    <th colspan="2">Total:</th>
    <td style="text-align:center;"><span id="total">0</span>
        <input type="hidden" name="total1" id="total1"></td>
</tr>

<!-- "Total" Operations -->

<tr style="text-align:left;">
    <th  colspan="3">Judges name:<input type="text" style="width: 132px; background-color: lightgray;margin-left: 10px;" name="judge_name" value="Judge1">
        <div style="text-align: right;margin-right: 20px;">
    <button style="font-size: 32px; padding: 10px 20px;">Submit</button>
</div>
        Comments:<input type="text" style="width: 400px;background-color: lightgray;margin-left: 10px;"><br><br>
    </th>
</tr>

</table>

</form>



<script>
// JavaScript to calculate Total

function calculateSum() {
    let inputs = document.getElementsByName("gr");
    let sum = 0;

    for (let i = 0; i < inputs.length; i++) {
        sum += Number(inputs[i].value) || 0;
    }

    document.getElementById("total").innerHTML = sum;
    document.getElementById("total1").value = sum;

}

</script>
</body>
</html>