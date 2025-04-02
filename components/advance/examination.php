<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flisk - Security Exam</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #1e1e1e;
            color: #f4f4f4;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-color: #1f1f1f;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .auth-buttons {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .auth-buttons button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }

        .auth-buttons button:hover {
            background-color: #0056b3;
        }

        .exam-container {
            padding: 20px;
        }

        .question {
            margin-bottom: 20px;
        }

        .result {
            font-weight: bold;
            font-size: 1.2rem;
        }

        .loading {
            display: none;
        }

        .navbar a {
            color: white;
            text-decoration: none;
        }

        .navbar a:hover {
            color: lightblue;
        }
    </style>
</head>

<body>
    <div class="navbar">
        <div class="logo">
            <a href="../../index.php">
                <span>Flisk</span>
                <span style="color: blue;">JS</span>
            </a>
        </div>
        <div class="auth-buttons">
            <?php if (isset($_SESSION['username'])): ?>
                <span>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></span>
                <a href="logout.php">
                    <button>Log Out</button>
                </a>
            <?php else: ?>
                <a href="../../userinfo/login.php">
                    <button>Login</button>
                </a>
                <a href="../../userinfo/register.php">
                    <button>Register</button>
                </a>
            <?php endif; ?>
        </div>
    </div>

    <div class="exam-container">
        <h1>Security Exam (Pass mark: 17/20)</h1>
        <form id="examForm">
            <!-- SQL Injection Question -->
            <div class="question">
                <label for="q1">1. What is SQL Injection?</label><br>
                <input type="radio" name="q1" value="Correct answer" required> A vulnerability in a database query.<br>
                <input type="radio" name="q1" value="Incorrect answer"> A form of password cracking.<br>
                <input type="radio" name="q1" value="Incorrect answer"> A type of brute-force attack.<br>
            </div>

            <!-- Ports Question -->
            <div class="question">
                <label for="q2">2. What is the purpose of network ports?</label><br>
                <input type="radio" name="q2" value="Correct answer" required> To identify specific processes or services on a device.<br>
                <input type="radio" name="q2" value="Incorrect answer"> To route traffic through the internet.<br>
                <input type="radio" name="q2" value="Incorrect answer"> To prevent unauthorized access to a device.<br>
            </div>

            <!-- Metasploit Question -->
            <div class="question">
                <label for="q3">3. What is Metasploit?</label><br>
                <input type="radio" name="q3" value="Correct answer" required> A penetration testing framework for exploiting vulnerabilities.<br>
                <input type="radio" name="q3" value="Incorrect answer"> A virus scanner.<br>
                <input type="radio" name="q3" value="Incorrect answer"> A web browser.<br>
            </div>

            <!-- Wireshark Question -->
            <div class="question">
                <label for="q4">4. What is Wireshark used for?</label><br>
                <input type="radio" name="q4" value="Correct answer" required> To analyze network traffic.<br>
                <input type="radio" name="q4" value="Incorrect answer"> To encrypt network data.<br>
                <input type="radio" name="q4" value="Incorrect answer"> To firewall a network.<br>
            </div>

            <!-- Command Injection Question -->
            <div class="question">
                <label for="q5">5. What is Command Injection?</label><br>
                <input type="radio" name="q5" value="Correct answer" required> A vulnerability that allows an attacker to execute arbitrary commands on a server.<br>
                <input type="radio" name="q5" value="Incorrect answer"> A method to encrypt data.<br>
                <input type="radio" name="q5" value="Incorrect answer"> A form of phishing attack.<br>
            </div>

            <!-- Local File Inclusion (LFI) Question -->
            <div class="question">
                <label for="q6">6. What is Local File Inclusion (LFI)?</label><br>
                <input type="radio" name="q6" value="Correct answer" required> A vulnerability that allows an attacker to include local files on the server.<br>
                <input type="radio" name="q6" value="Incorrect answer"> A method to encode files for secure transmission.<br>
                <input type="radio" name="q6" value="Incorrect answer"> A technique to prevent unauthorized file access.<br>
            </div>

            <!-- Question 7 -->
            <div class="question">
                <label for="q7">7. Which HTTP method is often used in SQL Injection attacks?</label><br>
                <input type="radio" name="q7" value="Incorrect answer" required> PUT<br>
                <input type="radio" name="q7" value="Correct answer"> POST<br>
                <input type="radio" name="q7" value="Incorrect answer"> GET<br>
            </div>

            <!-- Question 8 -->
            <div class="question">
                <label for="q8">8. What is a common attack used to exploit ports in a network?</label><br>
                <input type="radio" name="q8" value="Correct answer" required> Port scanning.<br>
                <input type="radio" name="q8" value="Incorrect answer"> Denial-of-Service (DoS).<br>
                <input type="radio" name="q8" value="Incorrect answer"> Cross-Site Scripting (XSS).<br>
            </div>

            <!-- Question 9 -->
            <div class="question">
                <label for="q9">9. How does Metasploit help in penetration testing?</label><br>
                <input type="radio" name="q9" value="Correct answer" required> It provides exploits to test system vulnerabilities.<br>
                <input type="radio" name="q9" value="Incorrect answer"> It encrypts data for secure transmission.<br>
                <input type="radio" name="q9" value="Incorrect answer"> It blocks unauthorized access to systems.<br>
            </div>

            <!-- Question 10 -->
            <div class="question">
                <label for="q10">10. What does Wireshark primarily capture?</label><br>
                <input type="radio" name="q10" value="Correct answer" required> Network packets.<br>
                <input type="radio" name="q10" value="Incorrect answer"> Emails.<br>
                <input type="radio" name="q10" value="Incorrect answer"> Encrypted data.<br>
            </div>

            <!-- Question 11 -->
            <div class="question">
                <label for="q11">11. Command Injection attacks can lead to:</label><br>
                <input type="radio" name="q11" value="Correct answer" required> Arbitrary code execution on the server.<br>
                <input type="radio" name="q11" value="Incorrect answer"> Data encryption.<br>
                <input type="radio" name="q11" value="Incorrect answer"> Denial of Service.<br>
            </div>

            <!-- Question 12 -->
            <div class="question">
                <label for="q12">12. Which of the following is a common mitigation against Local File Inclusion?</label><br>
                <input type="radio" name="q12" value="Correct answer" required> Proper input sanitization and validation.<br>
                <input type="radio" name="q12" value="Incorrect answer"> Using complex passwords.<br>
                <input type="radio" name="q12" value="Incorrect answer"> Installing antivirus software.<br>
            </div>

            <!-- Question 13 -->
            <div class="question">
                <label for="q13">13. In Metasploit, what does the term "exploit" refer to?</label><br>
                <input type="radio" name="q13" value="Correct answer" required> A piece of code designed to take advantage of a vulnerability.<br>
                <input type="radio" name="q13" value="Incorrect answer"> A software to monitor network traffic.<br>
                <input type="radio" name="q13" value="Incorrect answer"> A technique to block attacks.<br>
            </div>

            <!-- Question 14 -->
            <div class="question">
                <label for="q14">14. What is the default port for HTTP?</label><br>
                <input type="radio" name="q14" value="Correct answer" required> 80<br>
                <input type="radio" name="q14" value="Incorrect answer"> 443<br>
                <input type="radio" name="q14" value="Incorrect answer"> 21<br>
            </div>

            <!-- Question 15 -->
            <div class="question">
                <label for="q15">15. What is a key characteristic of a Command Injection attack?</label><br>
                <input type="radio" name="q15" value="Correct answer" required> An attacker executes system commands via an application.<br>
                <input type="radio" name="q15" value="Incorrect answer"> An attacker decrypts password hashes.<br>
                <input type="radio" name="q15" value="Incorrect answer"> An attacker uploads malicious files.<br>
            </div>

            <!-- Question 16 -->
            <div class="question">
                <label for="q16">16. What kind of attack is Local File Inclusion (LFI) often associated with?</label><br>
                <input type="radio" name="q16" value="Correct answer" required> Accessing unauthorized files on the server.<br>
                <input type="radio" name="q16" value="Incorrect answer"> Distributed Denial of Service (DDoS).<br>
                <input type="radio" name="q16" value="Incorrect answer"> Credential stuffing.<br>
            </div>

            <!-- Question 17 -->
            <div class="question">
                <label for="q17">17. Which of these is a correct method to prevent SQL Injection?</label><br>
                <input type="radio" name="q17" value="Correct answer" required> Using prepared statements with bound parameters.<br>
                <input type="radio" name="q17" value="Incorrect answer"> Using JavaScript to filter inputs.<br>
                <input type="radio" name="q17" value="Incorrect answer"> Encrypting database passwords.<br>
            </div>

            <!-- Question 18 -->
            <div class="question">
                <label for="q18">18. What is the primary use of a port scanner?</label><br>
                <input type="radio" name="q18" value="Correct answer" required> To identify open ports and services on a system.<br>
                <input type="radio" name="q18" value="Incorrect answer"> To monitor network traffic.<br>
                <input type="radio" name="q18" value="Incorrect answer"> To block unauthorized access.<br>
            </div>

            <!-- Question 19 -->
            <div class="question">
                <label for="q19">19. What is the main goal of a Metasploit Framework attack?</label><br>
                <input type="radio" name="q19" value="Correct answer" required> To exploit vulnerabilities and gain access to a system.<br>
                <input type="radio" name="q19" value="Incorrect answer"> To perform encryption.<br>
                <input type="radio" name="q19" value="Incorrect answer"> To filter out malicious traffic.<br>
            </div>

            <!-- Question 20 -->
            <div class="question">
                <label for="q20">20. In Wireshark, which filter would you use to capture HTTP traffic?</label><br>
                <input type="radio" name="q20" value="Correct answer" required> tcp.port == 80<br>
                <input type="radio" name="q20" value="Incorrect answer"> udp.port == 443<br>
                <input type="radio" name="q20" value="Incorrect answer"> ip.src == 192.168.0.1<br>
            </div>

            <div class="loading" id="loadingMessage">Submitting your answers...</div>
            <div class="result" id="result"></div>
            <button type="submit">Submit</button>
        </form>
    </div>

    <script>
        const correctAnswers = {
            q1: 'A vulnerability in a database query.',
            q2: 'To identify specific processes or services on a device.',
            q3: 'A penetration testing framework for exploiting vulnerabilities.',
            q4: 'To analyze network traffic.',
            q5: 'A vulnerability that allows an attacker to execute arbitrary commands on a server.',
            q6: 'A vulnerability that allows an attacker to include local files on the server.',
            q7: 'POST',
            q8: 'Port scanning.',
            q9: 'It provides exploits to test system vulnerabilities.',
            q10: 'Network packets.',
            q11: 'Arbitrary code execution on the server.',
            q12: 'Proper input sanitization and validation.',
            q13: 'A piece of code designed to take advantage of a vulnerability.',
            q14: '80',
            q15: 'An attacker executes system commands via an application.',
            q16: 'Accessing unauthorized files on the server.',
            q17: 'Using prepared statements with bound parameters.',
            q18: 'To identify open ports and services on a system.',
            q19: 'To exploit vulnerabilities and gain access to a system.',
            q20: 'tcp.port == 80'
        };

        const form = document.getElementById('examForm');
        const result = document.getElementById('result');
        const loadingMessage = document.getElementById('loadingMessage');

        form.addEventListener('submit', function (event) {
            event.preventDefault();
            loadingMessage.style.display = 'block';
            let correctCount = 0;

            for (let question in correctAnswers) {
                const selectedAnswer = form.querySelector(`input[name="${question}"]:checked`);
                if (selectedAnswer && selectedAnswer.value === correctAnswers[question]) {
                    correctCount++;
                }
            }

            loadingMessage.style.display = 'none';
            if (correctCount >= 17) {
                result.textContent = `You passed! You got ${correctCount}/20 correct.`;
                result.style.color = 'green';
            } else {
                result.textContent = `You failed. You got ${correctCount}/20 correct.`;
                result.style.color = 'red';
            }
        });
    </script>
</body>

</html>
