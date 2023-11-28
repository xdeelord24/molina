<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Vaccination Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="container">
        <h2>Add Vaccination Record</h2>
        <form method="post" action="add_record.php">
            <div class="form-group">
                <label for="firstName">First Name</label>
                <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Enter First Name"
                    required>
            </div>
            <div class="form-group">
                <label for="lastName">Last Name</label>
                <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Enter Last Name"
                    required>
            </div>
            <div class="form-group">
                <label for="mobileNumber">Mobile Number</label>
                <input type="tel" class="form-control" id="mobileNumber" name="mobileNumber"
                    placeholder="Enter Mobile Number" required>
            </div>
            <div class="form-group">
                <label for="homeAddress">Home Address</label>
                <input type="text" class="form-control" id="homeAddress" name="homeAddress"
                    placeholder="Street No. Street Name Bldg No." required>
            </div>
            <div class="form-group">
                <label for="province">Province</label>
                <select class="form-control" id="province" name="province">
                    <option value="">-- select one --</option>
                </select>
            </div>
            <div class="form-group">
                <label for="city">City</label>
                <select class="form-control" id="city" name="city">
                    <option value="">-- select one --</option>
                </select>
            </div>
            <div class="form-group">
                <label for="dateOfBirth">Date of Birth</label>
                <input type="date" class="form-control" id="dateOfBirth" name="dateOfBirth" required>
            </div>
            <div class="form-group">
                <label for="gender">Gender</label>
                <div>
                    <input type="radio" id="male" name="gender" value="male">
                    <label for="male">Male</label>
                    <input type="radio" id="female" name="gender" value="female">
                    <label for="female">Female</label>
                </div>
            </div>
            <div class="form-group">
                <label for="nationality">Nationality</label>
                <select class="form-control" id="nationality" name="nationality">
                    <option value="">-- select one --</option>
                    <option value="American">American</option>
                    <option value="British">British</option>
                    <option value="Canadian">Canadian</option>
                    <option value="Dutch">Dutch</option>
                    <option value="Egyptian">Egyptian</option>
                    <option value="Filipino">Filipino</option>
                </select>
            </div>
            <div class="form-group">
                <label for="firstDose">First Dose</label>
                <select class="form-control" id="firstDose" name="firstDose">
                    <option value="">-- select one --</option>
                    <option value="Pfizer-BioNTech">Pfizer-BioNTech</option>
                    <option value="Moderna">Moderna (mRNA-1273)</option>
                    <option value="Oxford-AstraZeneca">Oxford/AstraZeneca</option>
                    <option value="J&J">J&J</option>
                    <option value="Sinopharm">Sinopharm</option>
                    <option value="Sinovac">Sinovac</option>
                    <option value="COVAXIN">COVAXIN</option>
                    <option value="Covovax">Covovax</option>
                </select>
            </div>
            <div class="form-group">
                <label for="secondDose">Second Dose</label>
                <select class="form-control" id="secondDose" name="secondDose">
                    <option value="">-- select one --</option>
                    <option value="Pfizer-BioNTech">Pfizer-BioNTech</option>
                    <option value="Moderna">Moderna (mRNA-1273)</option>
                    <option value="Oxford-AstraZeneca">Oxford/AstraZeneca</option>
                    <option value="J&J">J&J</option>
                    <option value="Sinopharm">Sinopharm</option>
                    <option value="Sinovac">Sinovac</option>
                    <option value="COVAXIN">COVAXIN</option>
                    <option value="Covovax">Covovax</option>
                </select>
            </div>
            <div class="form-group">
                <label for="firstBooster">First Booster</label>
                <select class="form-control" id="firstBooster" name="firstBooster">
                    <option value="">-- select one --</option>
                    <option value="Pfizer-BioNTech">Pfizer-BioNTech</option>
                    <option value="Moderna">Moderna (mRNA-1273)</option>
                    <option value="Oxford-AstraZeneca">Oxford/AstraZeneca</option>
                    <option value="J&J">J&J</option>
                    <option value="Sinopharm">Sinopharm</option>
                    <option value="Sinovac">Sinovac</option>
                    <option value="COVAXIN">COVAXIN</option>
                    <option value="Covovax">Covovax</option>
                </select>
            </div>
            <div class="form-group">
                <label for="secondBooster">Second Booster</label>
                <select class="form-control" id="secondBooster" name="secondBooster">
                    <option value="">-- select one --</option>
                    <option value="Pfizer-BioNTech">Pfizer-BioNTech</option>
                    <option value="Moderna">Moderna (mRNA-1273)</option>
                    <option value="Oxford-AstraZeneca">Oxford/AstraZeneca</option>
                    <option value="J&J">J&J</option>
                    <option value="Sinopharm">Sinopharm</option>
                    <option value="Sinovac">Sinovac</option>
                    <option value="COVAXIN">COVAXIN</option>
                    <option value="Covovax">Covovax</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
            <a href="index.php" class="btn btn-primary btn-sm">Back</a>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
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
                });
            });

        // Fetch cities based on the selected province
        document.getElementById('province').addEventListener('change', function () {
            let provinceCode = this.value;
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
                    });
                });
        });

    </script>
</body>

</html>