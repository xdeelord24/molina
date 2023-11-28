<?php
include 'update_record.php';
$formattedDateOfBirth = date('Y-m-d', strtotime($dateOfBirth));
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Vaccination Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="container">
        <h2>View Vaccination Record</h2>
        <form method="post" action="update_record.php">
            <div class="form-group">
                <label for="recordId">Record ID</label>
                <input type="text" class="form-control" id="id" name="id" value="<?php echo htmlspecialchars($id); ?>"
                    readonly>

            </div>
            <div class="form-group">
                <label for="firstName">First Name</label>
                <input type="text" class="form-control" id="firstName" name="firstName" readonly
                    value="<?php echo htmlspecialchars($firstName); ?>">
            </div>
            <div class="form-group">
                <label for="lastName">Last Name</label>
                <input type="text" class="form-control" id="lastName" name="lastName" readonly
                    value="<?php echo htmlspecialchars($lastName); ?>">
            </div>
            <div class="form-group">
                <label for="mobileNumber">Mobile Number</label>
                <input type="tel" class="form-control" id="mobileNumber" name="mobileNumber"
                    value="<?php echo htmlspecialchars($mobileNumber); ?>" placeholder="Enter Mobile Number" readonly>
            </div>
            <div class="form-group">
                <label for="homeAddress">Home Address</label>
                <input type="text" class="form-control" id="homeAddress" name="homeAddress"
                    value="<?php echo htmlspecialchars($homeAddress); ?>" placeholder="Enter Home Address" readonly>
            </div>
            <div class="form-group">
                <label for="province">Province</label>
                <select class="form-control" id="province" name="province" disabled>
                    <option value="">-- select one --</option>
                </select>
            </div>
            <div class="form-group">
                <label for="city">City</label>
                <select class="form-control" id="city" name="city" disabled>
                    <option value="">-- select one --</option>
                </select>
            </div>
            <div class="form-group">
                <label for="dateOfBirth">Date of Birth</label>
                <input type="date" class="form-control" id="dateOfBirth" name="dateOfBirth"
                    value="<?php echo htmlspecialchars($formattedDateOfBirth); ?>" readonly>
            </div>
            <div class="form-group">
                <label for="gender">Gender</label>
                <div>
                    <input type="radio" id="male" name="gender" value="male" <?php echo ($gender == 'male') ? 'checked' : ''; ?> disabled>
                    <label for="male">Male</label>
                    <input type="radio" id="female" name="gender" value="female" <?php echo ($gender == 'female') ? 'checked' : ''; ?> disabled>
                    <label for="female">Female</label>
                </div>
            </div>
            <div class="form-group">
                <label for="nationality">Nationality</label>
                <select class="form-control" id="nationality" name="nationality" disabled>
                    <?php
                    $nationalities = ["American", "British", "Canadian", "Dutch", "Egyptian", "Filipino"];
                    foreach ($nationalities as $nat) {
                        echo '<option value="' . $nat . '"' . ($nat == $nationality ? ' selected' : '') . '>' . $nat . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="firstDose">First Dose</label>
                <select class="form-control" id="firstDose" name="firstDose" disabled>
                    <?php
                    $vaccines = ["Pfizer-BioNTech", "Moderna", "Oxford-AstraZeneca", "J&J", "Sinopharm", "Sinovac", "COVAXIN", "Covovax"];
                    foreach ($vaccines as $vaccine) {
                        echo '<option value="' . $vaccine . '"' . ($vaccine == $firstDose ? ' selected' : '') . '>' . $vaccine . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="secondDose">Second Dose</label>
                <select class="form-control" id="secondDose" name="secondDose" disabled>
                    <?php
                    $vaccines = ["Pfizer-BioNTech", "Moderna", "Oxford-AstraZeneca", "J&J", "Sinopharm", "Sinovac", "COVAXIN", "Covovax"];
                    foreach ($vaccines as $vaccine) {
                        echo '<option value="' . $vaccine . '"' . ($vaccine == $secondDose ? ' selected' : '') . '>' . $vaccine . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="firstBooster">First Booster</label>
                <select class="form-control" id="firstBooster" name="firstBooster" disabled>
                    <?php
                    $vaccines = ["Pfizer-BioNTech", "Moderna", "Oxford-AstraZeneca", "J&J", "Sinopharm", "Sinovac", "COVAXIN", "Covovax"];
                    foreach ($vaccines as $vaccine) {
                        echo '<option value="' . $vaccine . '"' . ($vaccine == $firstBooster ? ' selected' : '') . '>' . $vaccine . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="secondBooster">Second Booster</label>
                <select class="form-control" id="secondBooster" name="secondBooster" disabled>
                    <?php
                    $vaccines = ["Pfizer-BioNTech", "Moderna", "Oxford-AstraZeneca", "J&J", "Sinopharm", "Sinovac", "COVAXIN", "Covovax"];
                    foreach ($vaccines as $vaccine) {
                        echo '<option value="' . $vaccine . '"' . ($vaccine == $secondBooster ? ' selected' : '') . '>' . $vaccine . '</option>';
                    }
                    ?>
                </select>
            </div>
            <a href="index.php" class="btn btn-primary btn-sm">Back</a>
        </form>
    </div>
    <!-- Include JavaScript resources -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <!-- Add any additional scripts needed for the form -->
    <script>
        var preselectedProvince = '<?php echo $province; ?>';
        var preselectedCity = '<?php echo $city; ?>';
    </script>

    <script>
        // Fetch provinces
        fetch('https://psgc.gitlab.io/api/provinces/')
            .then(response => response.json())
            .then(data => {
                let provinceSelect = document.getElementById('province');
                data.forEach(province => {
                    let option = document.createElement('option');
                    option.value = province.code;
                    option.text = province.name;
                    provinceSelect.add(option);
                    if (province.code === preselectedProvince) {
                        option.selected = true;
                    }
                });

                // If there's a preselected province, fetch its cities
                if (preselectedProvince) {
                    fetchCities(preselectedProvince);
                }
            });

        // Function to fetch cities
        function fetchCities(provinceCode) {
            fetch(`https://psgc.gitlab.io/api/cities/?province_code=${provinceCode}`)
                .then(response => response.json())
                .then(data => {
                    let citySelect = document.getElementById('city');
                    citySelect.innerHTML = ''; // Clear existing options
                    data.forEach(city => {
                        let option = document.createElement('option');
                        option.value = city.code;
                        option.text = city.name;
                        citySelect.add(option);
                        if (city.code === preselectedCity) {
                            option.selected = true;
                        }
                    });
                });
        }

        // Event listener for province change
        document.getElementById('province').addEventListener('change', function () {
            let provinceCode = this.value;
            fetchCities(provinceCode);
        });




    </script>

</body>

</html>