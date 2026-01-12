<?php
session_start();

$name = $email = $university_id = $dob = $join_trimester_date = $current_trimester = $department = $completed_credits = '';
$errors = [];
$success = '';

$trimester_options = [
    'Trimester 1',
    'Trimester 2',
    'Trimester 3',
    'Trimester 4',
    'Trimester 5',
    'Trimester 6',
    'Trimester 7',
    'Trimester 8',
    'Trimester 9',
    'Trimester 10',
    'Trimester 11',
    'Trimester 12'
];

$department_options = [
    'Computer Science & Engineering',
    'Electrical & Electronic Engineering',
    'Data Science',
    'BBA',
    'EDS',
    'Economics',
    'English',
    'Pharmacy'
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $university_id = trim($_POST['university_id'] ?? '');
    $dob = trim($_POST['dob'] ?? '');
    $join_trimester_date = trim($_POST['join_trimester_date'] ?? '');
    $current_trimester = trim($_POST['current_trimester'] ?? '');
    $department = trim($_POST['department'] ?? '');
    $completed_credits = trim($_POST['completed_credits'] ?? '');

    // Basic validations
    if ($name === '') {
        $errors[] = 'Full name is required.';
    }

    if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Enter a valid email address.';
    }

    if ($university_id === '') {
        $errors[] = 'University ID is required.';
    }

    if ($dob === '') {
        $errors[] = 'Date of birth is required.';
    }

    if ($join_trimester_date === '') {
        $errors[] = 'Join trimester date is required.';
    }

    if ($current_trimester === '') {
        $errors[] = 'Select your current trimester.';
    }

    if ($department === '') {
        $errors[] = 'Select your department.';
    }

    if ($completed_credits === '') {
        $errors[] = 'Completed credits are required.';
    } elseif (!is_numeric($completed_credits) || $completed_credits < 0) {
        $errors[] = 'Completed credits must be a non-negative number.';
    }

    if (empty($_FILES['profile_picture']['name'])) {
        $errors[] = 'Please upload a profile picture.';
    }

    if (!$errors) {
        // TODO: Save the student record and handle file upload securely. and I have to 
        //add databse logic here also for upload the profile picture
        $success = 'Registration submitted successfully.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
    <link rel="stylesheet" href="../assets/css/register.css">
</head>

<body>
    <div class="register-container">
        <div class="register-card">
            <div class="register-header">
                <div class="logo-circle">
                    <svg class="logo-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M3 6.75L12 3L21 6.75L12 10.5L3 6.75Z" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M3 12L12 15.75L21 12" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M3 17.25L12 21L21 17.25" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
                <div>
                    <p class="eyebrow">Student Registration</p>
                    <h1>Create Your Account</h1>
                    <p class="subtext">Join and continue your journey at UIU.</p>
                </div>
            </div>

            <?php if ($success): ?>
                <div class="alert success">
                    <strong>Success:</strong> <?php echo htmlspecialchars($success); ?>
                </div>
            <?php endif; ?>

            <?php if ($errors): ?>
                <div class="alert error">
                    <strong>Please review:</strong>
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li><?php echo htmlspecialchars($error); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form class="register-form" method="POST" action="" enctype="multipart/form-data">
                <div class="form-grid">
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" id="name" name="name" placeholder="Enter your full name" required
                            value="<?php echo htmlspecialchars($name); ?>">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="name@bscse.uiu.ac.bd" required
                            value="<?php echo htmlspecialchars($email); ?>">
                    </div>

                    <div class="form-group">
                        <label for="university_id">University ID</label>
                        <input type="text" id="university_id" name="university_id" placeholder="e.g. 0112230000" required
                            value="<?php echo htmlspecialchars($university_id); ?>">
                    </div>

                    <div class="form-group">
                        <label for="dob">Date of Birth</label>
                        <input type="date" id="dob" name="dob" required
                            value="<?php echo htmlspecialchars($dob); ?>">
                    </div>

                    <div class="form-group">
                        <label for="join_trimester_date">Starting Date</label>
                        <input type="date" id="join_trimester_date" name="join_trimester_date" required
                            value="<?php echo htmlspecialchars($join_trimester_date); ?>">
                    </div>

                    <div class="form-group">
                        <label for="current_trimester">Current Trimester</label>
                        <select id="current_trimester" name="current_trimester" required>
                            <option value="">Select trimester</option>
                            <?php foreach ($trimester_options as $option): ?>
                                <option value="<?php echo htmlspecialchars($option); ?>"
                                    <?php echo $current_trimester === $option ? 'selected' : ''; ?>>
                                    <?php echo htmlspecialchars($option); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="department">Department</label>
                        <select id="department" name="department" required>
                            <option value="">Select department</option>
                            <?php foreach ($department_options as $option): ?>
                                <option value="<?php echo htmlspecialchars($option); ?>"
                                    <?php echo $department === $option ? 'selected' : ''; ?>>
                                    <?php echo htmlspecialchars($option); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="completed_credits">Completed Credits</label>
                        <input type="number" id="completed_credits" name="completed_credits" min="0" step="1" required
                            placeholder="e.g. 60"
                            value="<?php echo htmlspecialchars($completed_credits); ?>">
                    </div>

                    <div class="form-group file-group">
                        <label for="profile_picture">Profile Picture</label>
                        <div class="file-input">
                            <input type="file" id="profile_picture" name="profile_picture" accept="image/*" required>
                            <span class="file-hint">Upload JPG, PNG, or JPEG</span>
                        </div>
                    </div>
                </div>

                <button type="submit" class="primary-btn">Create Account</button>
            </form>

            <div class="footer-note">
                <p>Already registered? <a href="login.php">Sign in here</a></p>
            </div>
        </div>
    </div>
</body>

</html>