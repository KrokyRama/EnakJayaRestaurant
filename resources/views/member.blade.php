<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>Member Dashboard - Enak Jaya Restaurant</title>
    <style>
        :root {
            --primary-color: #f4a261;
            --secondary-color: #e76f51;
            --background-color: #ffffff;
            --text-color: #333;
            --header-bg: #2f3e46;
            --header-text: #ffffff;
            --border-color: #ddd;
            --success-color: #2a9d8f; /* Updated success color */
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: var(--background-color);
            color: var(--text-color);
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
        }

        .header {
            background-color: var(--header-bg);
            color: var(--header-text);
            padding: 20px 0;
            text-align: center;
            position: relative;
        }

        .header h1 {
            margin: 0;
            font-size: 2.5em;
        }

        .header p {
            margin: 10px 0 0;
            font-size: 1.2em;
            color: var(--primary-color);
        }

        /* Welcome Back Accent */
        .welcome-message {
            position: absolute;
            top: 10px;
            left: 20px;
            background-color: var(--success-color);
            color: white;
            padding: 10px 20px;
            border-radius: 20px;
            font-size: 1em;
            font-weight: bold;
        }

        .section {
            background-color: #fff;
            margin-bottom: 10px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            overflow: hidden;
        }

        .section-header {
            background-color: var(--primary-color);
            color: white;
            padding: 15px 20px;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .section-header h2 {
            margin: 0;
            font-size: 1.2em;
        }

        .section-content {
            padding: 20px;
            display: none;
        }

        .large-label {
            font-size: 16px; /* Adjusted font size for better readability */
            font-weight: bold;
            margin-bottom: 5px;
        }

        .input-group-flex {
            display: flex;
            flex-direction: column;
            gap: 15px;
            max-width: 600px;
            margin: 0 auto;
        }

        .input-group-flex div {
            display: flex;
            flex-direction: column;
        }

        .input {
            width: 100%;
            padding: 10px;
            background-color: #ffffff;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
            color: #555555;
        }

        select.input {
            color: gray; /* Change selected text color to black */
        }

        select.input.valid {
            color: black;
            background-color: #f0f8ff; /* Black color if option is selected */
        }

        .dropdown-icon {
            transition: transform 0.3s ease;
        }

        .section.active .dropdown-icon {
            transform: rotate(180deg);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #ffffff;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: var(--secondary-color);
            color: white;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .action-buttons {
            display: flex;
            gap: 5px;
        }

        .action-buttons button {
            padding: 5px 10px;
            cursor: pointer;
            border: none;
            border-radius: 3px;
            transition: background-color 0.3s;
        }

        .edit-btn {
            background-color: #008CBA;
            color: white;
        }

        .delete-btn {
            background-color: #f44336;
            color: white;
        }

        .add-button {
            background-color: var(--secondary-color);
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin-bottom: 20px;
            cursor: pointer;
            border-radius: 3px;
            transition: background-color 0.3s;
        }

        .add-button:hover {
            opacity: 0.8;
        }

        @media screen and (max-width: 600px) {
            .container {
                width: 95%;
                padding: 10px;
            }

            table, th, td {
                font-size: 14px;
            }

            .action-buttons button {
                padding: 3px 6px;
                font-size: 12px;
            }
        }

        /* Additional styles for membership points */
        .stats {
            display: flex;
            justify-content: space-around;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }
        .stat {
            text-align: center;
            margin: 10px;
        }
        .stat-value {
            font-size: 24px;
            font-weight: bold;
            color: var(--success-color); /* Updated to use success color */
        }
        .stat-label {
            font-size: 14px;
            color: #666;
        }
        .progress-bar {
            width: 100%;
            height: 20px;
            background-color: #e0e0e0;
            border-radius: 10px;
            overflow: hidden;
            margin-bottom: 20px;
        }
        .progress {
            width: 0%;
            height: 100%;
            background-color: var(--success-color); /* Updated to use success color */
            transition: width 0.5s ease-in-out;
        }
        .input-group {
            display: flex;
            margin-bottom: 20px;
        }
        #orderIdInput {
            flex-grow: 1;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px 0 0 5px;
            font-size: 16px;
        }
        .submit-btn {
            padding: 10px 20px;
            background-color: var(--primary-color);
            color: white;
            border: none;
            border-radius: 0 5px 5px 0;
            cursor: pointer;
            transition: background-color 0.3s;
            font-size: 16px;
        }
        .submit-btn:hover {
            background-color: #e76f51;
        }

        .submit-btn1 {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: var(--primary-color);
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            font-size: 16px;
            width: 100%;
        }
        .submit-btn1:hover {
            background-color: #e76f51;
        }
        .message {
            text-align: center;
            font-weight: bold;
            margin-top: 20px;
            color: red;
        }
        .celebration {
            display: none;
            background-color: #FFD700;
            color: #333;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            margin-top: 20px;
            animation: fadeOut 5s forwards; /* Increased duration to 5 seconds */
        }
        @keyframes fadeOut {
            to {
                opacity: 0;
                display: none;
            }
        }
        .voucher-list {
            margin-top: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom:10px;
        }
        .voucher-header {
            background-color: #f2f2f2;
            padding: 10px;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .voucher-content {
            display: none;
            padding: 10px;
        }
        .voucher-item {
            background-color: #fff;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .voucher-item.used {
            background-color: #f4f4f4;
            color: #999;
 text-decoration: line-through;
        }
        .voucher-item button {
            margin-top: 5px;
            padding: 5px 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .voucher-item button:hover {
            background-color: #45a049;
        }
        .voucher-item button:disabled {
            background-color: #cccccc;
            cursor: not-allowed;
        }

        .history-header {
            background-color: #f2f2f2;
            padding: 10px;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        /* Current Profile Styles */
        .current-profile {
            background-color: #f9f9f9;
            padding: 15px 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .current-profile h3 {
            margin-top: 0;
            color: var(--primary-color);
        }

        .profile-details {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .profile-details p {
            margin: 0;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Dashboard</h1>
        <p>Enak Jaya Restaurant</p>
        <!-- Welcome Back Message -->
{{--        <div class="welcome-message" id="welcomeMessage" style="left: 50%; transform: translateX(-50%);">Welcome Back, John Doe!</div>--}}
    </div>

    <div class="container">
        <!-- Edit Profile Section -->
        <div class="section" id="profileSection">
            <div class="section-header" onclick="toggleSection('profileSection')">
                <h2>Edit Profile</h2>
                <span class="dropdown-icon">▼</span>
            </div>
            <div class="section-content">
                <!-- Current Profile Container -->
                <div class="current-profile" id="currentProfile">
                    <h3>Current Profile</h3>
                    <div class="profile-details">
                        <p><strong>Name:</strong> <span id="currentName">John Doe</span></p>
                        <p><strong>Phone Number:</strong> <span id="currentPhone">+1234567890</span></p>
                        <p><strong>Gender:</strong> <span id="currentGender">Male</span></p>
                        <p><strong>Email:</strong> <span id="currentEmail">johndoe@example.com</span></p>
                    </div>
                </div>
                <!-- End of Current Profile Container -->

                <form id="editProfileForm">
                    <div class="input-group-flex">
                        <div>
                            <label for="name" class="large-label">Name:</label>
                            <input class="input" type="text" id="name" name="name" placeholder="Enter your name" required>
                        </div>
                        <div>
                            <label for="phone" class="large-label">Phone Number:</label>
                            <input class="input" type="tel" id="phone" name="phone" placeholder="Enter your phone number" required>
                        </div>
                        <div>
                            <label for="gender" class="large-label">Gender:</label>
                            <select class="input" id="gender" name="gender" required>
                                <option value="" disabled selected>Select gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div>
                            <label for="email" class="large-label">Email:</label>
                            <input class="input" type="email" id="email" name="email" placeholder="Enter your email" required>
                        </div>
                        <div>
                            <label for="password" class="large-label">New Password:</label>
                            <input class="input" type="password" id="password" name="password" placeholder="Enter new password">
                        </div>
                        <div>
                            <label for="confirmPassword" class="large-label">Confirm New Password:</label>
                            <input class="input" type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm new password">
                        </div>
                    </div>
                    <button type="submit" class="submit-btn1">Save Changes</button>
                </form>
            </div>
        </div>

        <!-- Purchase History Section -->
        <div class="section" id="historySection">
            <div class="section-header" onclick="toggleSection('historySection')">
                <h2>Purchase History</h2>
                <span class="dropdown-icon">▼</span>
            </div>
            <div class="section-content">
                <table>
                    <thead>
                        <tr>
                            <th>Order No.</th>
                            <th>Date</th>
                            <th>Total</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody id="historyTableBody">
                        <!-- Purchase history data will be inserted here -->
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Membership Points Section -->
        <div class="section" id="pointsSection">
            <div class="section-header" onclick="toggleSection('pointsSection')">
                <h2>Membership Points</h2>
                <span class="dropdown-icon">▼</span>
            </div>
            <div class="section-content">
                <div class="stats">
                    <div class="stat">
                        <div class="stat-value" id="totalPoints">0</div>
                        <div class="stat-label">Total Points</div>
                    </div>
                    <div class="stat">
                        <div class="stat-value" id="goalPoints">0%</div>
                        <div class="stat-label">Goal Points</div>
                    </div>
                </div>
                <div class="progress-bar">
                    <div class="progress" id="progressBar"></div>
                </div>
                <div class="input-group">
                    <input type="text" id="orderIdInput" placeholder="Enter Your Order ID">
                    <button id="submitBtn" class="submit-btn">Submit</button>
                </div>
                <div id="message" class="message"></div>
                <div class="celebration" id="celebration">
                    <h2>Congratulations!</h2>
                    <p>You have earned points!</p>
                    <p>Your discount voucher code: <strong id="voucherCode"></strong></p>
                </div>

                <div class="voucher-list" id="voucherList">
                    <div class="voucher-header" id="voucherHeader">
                        <span>Your Vouchers</span>
                        <span>&#9660;</span>
                    </div>
                    <div class="voucher-content" id="voucherContent">
                        <div id="voucherItems"></div>
                    </div>
                </div>

                <div class="history-dropdown" id="historyDropdown" onclick="toggleSection('historyDropdown')">
                    <div class="history-header" id="historyHeader">
                        <span>Points History</span>
                        <span>&#9660;</span>
                    </div>
                    <div class="history-content" id="historyContent">
                        <table class="history-table">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Total Spending</th>
                                    <th>Points Earned</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody id="pointsHistoryTableBody">
                                <!-- Points history data will be inserted here -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const orderIdInput = document.getElementById('orderIdInput');
        const submitBtn = document.getElementById('submitBtn');
        const messageDiv = document.getElementById('message');
        const progressBar = document.getElementById('progressBar');
        const totalPointsDiv = document.getElementById('totalPoints');
        const goalPointsDiv = document.getElementById('goalPoints');
        const historyContent = document.getElementById('historyContent');
        const historyTableBody = document.getElementById('historyTableBody');
        const celebration = document.getElementById('celebration');
        const voucherCodeElement = document.getElementById('voucherCode');
        const voucherList = document.getElementById('voucherList');
        const voucherItems = document.getElementById('voucherItems');
        const voucherHeader = document.getElementById('voucherHeader');
        const voucherContent = document.getElementById('voucherContent');
        const historyHeader = document.getElementById('historyHeader');
        const selectElement = document.getElementById('gender');
        const welcomeMessage = document.getElementById('welcomeMessage');

        // Current Profile Elements
        const currentName = document.getElementById('currentName');
        const currentPhone = document.getElementById('currentPhone');
        const currentGender = document.getElementById('currentGender');
        const currentEmail = document.getElementById('currentEmail');

        // Simulated member data (In real application, fetch from server)
        const memberData = {
            name: "John Doe",
            phone: "+1234567890",
            gender: "Male",
            email: "johndoe@example .com",
            purchaseHistory: [
                { orderId: '1001', date: '2024-01-10', total: 75000, status: 'Completed' },
                { orderId: '1002', date: '2024-02-15', total: 125000, status: 'Completed' }
            ],
            orderDatabase: { // Simulated Order ID to Total Price mapping
                '1001': 75000,
                '1002': 125000,
                '1003': 50000,
                '1004': 200000
            },
            pointsHistory: []
        };

        // Populate welcome message
        welcomeMessage.textContent = `Welcome Back, ${memberData.name}!`;

        // Populate current profile display
        function displayCurrentProfile() {
            currentName.textContent = memberData.name;
            currentPhone.textContent = memberData.phone;
            currentGender.textContent = memberData.gender;
            currentEmail.textContent = memberData.email;
        }

        displayCurrentProfile();

        // Populate Purchase History Table
        function populatePurchaseHistory() {
            historyTableBody.innerHTML = '';
            memberData.purchaseHistory.forEach(order => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${order.orderId}</td>
                    <td>${order.date}</td>
                    <td>${formatCurrency(order.total)}</td>
                    <td>${order.status}</td>
                `;
                historyTableBody.appendChild(row);
            });
        }

        populatePurchaseHistory();

        // Handle Edit Profile Form Submission
        document.getElementById('editProfileForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent default form submission
            const formData = new FormData(this);

            // Validate password fields
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirmPassword').value;

            if (password !== confirmPassword) {
                alert('Passwords do not match. Please try again.');
                return;
            }

            // Simulate sending data to server and updating profile
            // In real application, use fetch/AJAX to send data to server
            memberData.name = formData.get('name');
            memberData.phone = formData.get('phone');
            memberData.gender = formData.get('gender');
            memberData.email = formData.get('email');

            displayCurrentProfile();
            welcomeMessage.textContent = `Welcome Back, ${memberData.name}!`;
            alert('Profile updated successfully!');
            this.reset(); // Reset the form
        });

        // Function to format currency
        function formatCurrency(amount) {
            return `Rp${amount.toLocaleString('id-ID')}`;
        }

        // Function to update UI elements
        function updateUI() {
            totalPointsDiv.textContent = totalPoints;
            const goalPercentage = totalPoints % 100;
            goalPointsDiv.textContent = `${goalPercentage}%`;
            progressBar.style.width = `${goalPercentage}%`;
        }

        // Initialize points
        let totalPoints = 0;

        // Handle Order ID Submission
        submitBtn.addEventListener('click', function() {
            const orderId = orderIdInput.value.trim();
            if (orderId === "") {
                messageDiv.textContent = 'Please enter a valid Order ID.';
                return;
            }

            // Check if Order ID exists in the simulated database
            if (memberData.orderDatabase.hasOwnProperty(orderId)) {
                // Check if Order ID has already been processed
                if (memberData.pointsHistory.some(entry => entry.orderId === orderId)) {
                    messageDiv.textContent = 'Order ID has already been processed.';
                    return;
                }

                const totalSpending = memberData.orderDatabase[orderId];
                const pointsEarned = Math.floor(totalSpending * 0.10); // 10% of total spending

                // Update points
                totalPoints += pointsEarned;

                // Update Points History
                const newEntry = {
                    orderId: orderId,
                    totalSpending: totalSpending,
                    pointsEarned: pointsEarned,
                    date: new Date().toLocaleDateString()
                };
                memberData.pointsHistory.push(newEntry);
                addPointsHistory(newEntry);

                // Show success message
                messageDiv.textContent = `You earned ${pointsEarned} points!`;

                // Reset input field
                orderIdInput.value = '';

                // Update UI
                updateUI();

                // Check if points qualify for a voucher
                if (totalPoints >= (Math.floor(totalPoints / 100)) * 100 + 100) {
                    issueVoucher();
                }
            } else {
                messageDiv.textContent = 'Invalid Order ID. Please try again.';
            }
        });

        // Function to add entry to Points History Table
        function addPointsHistory(entry) {
            const pointsHistoryTableBody = document.getElementById('pointsHistoryTableBody');
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${entry.orderId}</td>
                <td>${formatCurrency(entry.totalSpending)}</td>
                < td>${entry.pointsEarned}</td>
                <td>${entry.date}</td>
            `;
            pointsHistoryTableBody.appendChild(row);
        }

        // Function to issue a voucher
        let voucherCount = 0;
        function issueVoucher() {
            const voucherCode = `VOUCHER${++voucherCount}`;
            const voucher = { code: voucherCode, used: false };
            memberData.vouchers = memberData.vouchers || [];
            memberData.vouchers.push(voucher);
            voucherCodeElement.textContent = voucherCode;
            celebration.style.display = 'block';

            setTimeout(() => {
                celebration.style.display = 'none';
            }, 5000); // Display for 5 seconds

            updateVoucherDisplay();
        }

        // Function to display vouchers
        function updateVoucherDisplay() {
            voucherItems.innerHTML = '';
            if (memberData.vouchers && memberData.vouchers.length > 0) {
                memberData.vouchers.forEach(voucher => {
                    const voucherDiv = document.createElement('div');
                    voucherDiv.className = 'voucher-item ' + (voucher.used ? 'used' : '');
                    voucherDiv.innerHTML = `
                        <p><strong>Voucher Code:</strong> ${voucher.code}</p>
                        <p><strong>Discount:</strong> 10%</p>
                        <button onclick="useVoucher('${voucher.code}')" ${voucher.used ? 'disabled' : ''}>Use Voucher</button>
                    `;
                    voucherItems.appendChild(voucherDiv);
                });
            } else {
                voucherItems.innerHTML = '<p>No vouchers available.</p>';
            }
        }

        // Function to use a voucher
        window.useVoucher = function(voucherCode) {
            const voucher = memberData.vouchers.find(v => v.code === voucherCode);
            if (voucher && !voucher.used) {
                voucher.used = true;
                updateVoucherDisplay();
                alert(`Voucher ${voucherCode} has been used.`);
            } else {
                alert('Invalid or already used voucher.');
            }
        };

        // Handle Voucher Header Click
        voucherHeader.addEventListener('click', function() {
            const isVisible = voucherContent.style.display === 'block';
            voucherContent.style.display = isVisible ? 'none' : 'block';
            voucherHeader.querySelector('span:last-child').innerHTML = isVisible ? '&#9650;' : '&#9660;';
        });

        // Handle Points History Header Click
        historyHeader.addEventListener('click', function() {
            const isVisible = historyContent.style.display === 'block';
            historyContent.style.display = isVisible ? 'none' : 'block';
            historyHeader.querySelector('span:last-child').innerHTML = isVisible ? '&#9650;' : '&#9660;';
        });

        // Initialize UI
        updateUI();
        updateVoucherDisplay();

    });

    // Function to toggle section visibility
    function toggleSection(sectionId) {
        const section = document.getElementById(sectionId);
        const sections = document.querySelectorAll('.section');
        sections.forEach(s => {
            if (s !== section) {
                s.classList.remove('active');
                s.querySelector('.section-content').style.display = 'none';
            }
        });
        section.classList.toggle('active');
        const content = section.querySelector('.section-content');
        content.style.display = section.classList.contains('active') ? 'block' : 'none';
        if (section.classList.contains('active')) {
            loadData(sectionId);
        }
    }

    // Function to load member data
    function loadData(sectionId) {
        // In this simulation, data is already loaded.
        // In a real application, fetch data from the server based on the section.
    }
    </script>

</body>
</html>
