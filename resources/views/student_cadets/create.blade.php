<form method="POST" action="">
    @csrf
    <input type="number" name="student_number" placeholder="Student number" required>
    <input type="text" name="first_name" placeholder="First Name" required>
    <input type="text" name="middle_name" placeholder="Middle Name">
    <input type="text" name="last_name" placeholder="Last Name" required>
    <input type="text" name="complexion" placeholder="Complexion" required>
    <input type="text" name="blood_type" placeholder="Blood Type" required>
    <input type="date" name="date_of_birth" placeholder="Date of Birth" required>
    <select name="sex" required>
        <option value="">Select Sex</option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
    </select>

    <input type="text" name="unit_number" placeholder="Unit Number">
    <input type="text" name="street" placeholder="Street" required>
    <input type="text" name="purok" placeholder="Purok" required>
    <input type="text" name="barangay" placeholder="Barangay" required>
    <input type="text" name="municipality_or_city" placeholder="Municipality or City" required>
    <input type="text" name="province" placeholder="Province" required>
    <input type="text" name="zip_code" placeholder="Zip Code" required>

    <button type="submit">Create Student Cadet</button>
</form>
