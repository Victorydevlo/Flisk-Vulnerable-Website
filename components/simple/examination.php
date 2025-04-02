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

            <!-- IDOR Question -->
            <div class="question">
                <label for="q2">2. What is IDOR (Insecure Direct Object Reference)?</label><br>
                <input type="radio" name="q2" value="Incorrect answer" required> A buffer overflow vulnerability.<br>
                <input type="radio" name="q2" value="Correct answer"> Accessing data without proper authorization.<br>
                <input type="radio" name="q2" value="Incorrect answer"> A session hijacking attack.<br>
            </div>

            <!-- Decryption Question -->
            <div class="question">
                <label for="q3">3. What is the primary purpose of decryption?</label><br>
                <input type="radio" name="q3" value="Correct answer" required> To convert encrypted data into readable format.<br>
                <input type="radio" name="q3" value="Incorrect answer"> To scramble data for confidentiality.<br>
                <input type="radio" name="q3" value="Incorrect answer"> To store data securely.<br>
            </div>

            <!-- Inconsistent Transaction Validation -->
            <div class="question">
                <label for="q4">4. What is inconsistent transaction validation?</label><br>
                <input type="radio" name="q4" value="Correct answer" required> Failing to check the validity of user inputs before processing.<br>
                <input type="radio" name="q4" value="Incorrect answer"> Encrypting transactions.<br>
                <input type="radio" name="q4" value="Incorrect answer"> Using multi-factor authentication.<br>
            </div>

            <!-- Gobuster Question -->
            <div class="question">
                <label for="q5">5. What is Gobuster used for?</label><br>
                <input type="radio" name="q5" value="Incorrect answer" required> Brute forcing login credentials.<br>
                <input type="radio" name="q5" value="Correct answer"> Directory and file discovery through fuzzing.<br>
                <input type="radio" name="q5" value="Incorrect answer"> Generating SSL certificates.<br>
            </div>

            <!-- Question 6 -->
            <div class="question">
                <label for="q6">6. What does CSRF stand for?</label><br>
                <input type="radio" name="q6" value="Correct answer" required> Cross-Site Request Forgery.<br>
                <input type="radio" name="q6" value="Incorrect answer"> Cross-Site Resource Forensics.<br>
                <input type="radio" name="q6" value="Incorrect answer"> Client-Side Request Forgery.<br>
            </div>

            <!-- Question 7 -->
            <div class="question">
                <label for="q7">7. Which vulnerability is associated with the lack of input sanitization in forms?</label><br>
                <input type="radio" name="q7" value="Correct answer" required> SQL Injection.<br>
                <input type="radio" name="q7" value="Incorrect answer"> Cross-Site Scripting.<br>
                <input type="radio" name="q7" value="Incorrect answer"> Cross-Site Request Forgery.<br>
            </div>

            <!-- Question 8 -->
            <div class="question">
                <label for="q8">8. Which of the following can prevent SQL Injection attacks?</label><br>
                <input type="radio" name="q8" value="Incorrect answer" required> Using unvalidated user input.<br>
                <input type="radio" name="q8" value="Correct answer"> Prepared statements and parameterized queries.<br>
                <input type="radio" name="q8" value="Incorrect answer"> Encrypting passwords.<br>
            </div>

            <!-- Question 9 -->
            <div class="question">
                <label for="q9">9. What does XSS stand for?</label><br>
                <input type="radio" name="q9" value="Correct answer" required> Cross-Site Scripting.<br>
                <input type="radio" name="q9" value="Incorrect answer"> Cross-Site Security.<br>
                <input type="radio" name="q9" value="Incorrect answer"> Cross-Site Source.<br>
            </div>

            <!-- Question 10 -->
            <div class="question">
                <label for="q10">10. What is the main risk of inadequate session management?</label><br>
                <input type="radio" name="q10" value="Correct answer" required> Session hijacking.<br>
                <input type="radio" name="q10" value="Incorrect answer"> Database corruption.<br>
                <input type="radio" name="q10" value="Incorrect answer"> Insufficient disk space.<br>
            </div>

            <!-- Question 11 -->
            <div class="question">
                <label for="q11">11. What is the purpose of CAPTCHA?</label><br>
                <input type="radio" name="q11" value="Correct answer" required> To prevent automated bots from abusing services.<br>
                <input type="radio" name="q11" value="Incorrect answer"> To improve form field validation.<br>
                <input type="radio" name="q11" value="Incorrect answer"> To encrypt passwords.<br>
            </div>

            <!-- Question 12 -->
            <div class="question">
                <label for="q12">12. What does HTTPS stand for?</label><br>
                <input type="radio" name="q12" value="Correct answer" required> HyperText Transfer Protocol Secure.<br>
                <input type="radio" name="q12" value="Incorrect answer"> Hyper Transfer Protocol Secure.<br>
                <input type="radio" name="q12" value="Incorrect answer"> Hyper Textual Scripting Protocol.<br>
            </div>

            <!-- Question 13 -->
            <div class="question">
                <label for="q13">13. What is a buffer overflow?</label><br>
                <input type="radio" name="q13" value="Correct answer" required> A vulnerability caused by writing data outside the memory buffer.<br>
                <input type="radio" name="q13" value="Incorrect answer"> A system crash.<br>
                <input type="radio" name="q13" value="Incorrect answer"> A data encryption issue.<br>
            </div>

            <!-- Question 14 -->
            <div class="question">
                <label for="q14">14. What is the primary goal of ethical hacking?</label><br>
                <input type="radio" name="q14" value="Correct answer" required> To identify and fix security vulnerabilities.<br>
                <input type="radio" name="q14" value="Incorrect answer"> To steal sensitive information.<br>
                <input type="radio" name="q14" value="Incorrect answer"> To destroy data.<br>
            </div>

            <!-- Question 15 -->
            <div class="question">
                <label for="q15">15. What is the risk of weak password policies?</label><br>
                <input type="radio" name="q15" value="Correct answer" required> Passwords can be easily guessed or cracked.<br>
                <input type="radio" name="q15" value="Incorrect answer"> Passwords will be stronger.<br>
                <input type="radio" name="q15" value="Incorrect answer"> Data will be more secure.<br>
            </div>

            <!-- Question 16 -->
            <div class="question">
                <label for="q16">16. Which of the following is a form of privilege escalation?</label><br>
                <input type="radio" name="q16" value="Correct answer" required> Gaining unauthorized access to higher-level system resources.<br>
                <input type="radio" name="q16" value="Incorrect answer"> Data encryption.<br>
                <input type="radio" name="q16" value="Incorrect answer"> User authentication.<br>
            </div>

            <!-- Question 17 -->
            <div class="question">
                <label for="q17">17. What is the purpose of an SSL/TLS certificate?</label><br>
                <input type="radio" name="q17" value="Correct answer" required> To encrypt communications between a client and a server.<br>
                <input type="radio" name="q17" value="Incorrect answer"> To validate user inputs.<br>
                <input type="radio" name="q17" value="Incorrect answer"> To block hackers.<br>
            </div>

            <!-- Question 18 -->
            <div class="question">
                <label for="q18">18. What is a common type of attack on APIs?</label><br>
                <input type="radio" name="q18" value="Correct answer" required> API Rate Limiting attacks.<br>
                <input type="radio" name="q18" value="Incorrect answer"> Data validation.<br>
                <input type="radio" name="q18" value="Incorrect answer"> Encryption.<br>
            </div>

            <!-- Question 19 -->
            <div class="question">
                <label for="q19">19. What does DNS spoofing refer to?</label><br>
                <input type="radio" name="q19" value="Correct answer" required> Redirecting traffic from a legitimate website to a fake one.<br>
                <input type="radio" name="q19" value="Incorrect answer"> Hacking DNS servers.<br>
                <input type="radio" name="q19" value="Incorrect answer"> Encrypting DNS traffic.<br>
            </div>

            <!-- Question 20 -->
            <div class="question">
                <label for="q20">20. What is the main purpose of a VPN?</label><br>
                <input type="radio" name="q20" value="Correct answer" required> To securely connect to a private network over the internet.<br>
                <input type="radio" name="q20" value="Incorrect answer"> To monitor network traffic.<br>
                <input type="radio" name="q20" value="Incorrect answer"> To block hackers.<br>
            </div>

            <button type="submit">Submit Exam</button>
        </form>

        <p id="result" class="result"></p>
        <p id="loadingMessage" class="loading">Submitting your answers...</p>
    </div>

    <script>
        const correctAnswers = {
            q1: 'A vulnerability in a database query.',
            q2: 'Accessing data without proper authorization.',
            q3: 'To convert encrypted data into readable format.',
            q4: 'Failing to check the validity of user inputs before processing.',
            q5: 'Directory and file discovery through fuzzing.',
            q6: 'Cross-Site Request Forgery.',
            q7: 'SQL Injection.',
            q8: 'Prepared statements and parameterized queries.',
            q9: 'Cross-Site Scripting.',
            q10: 'Session hijacking.',
            q11: 'To prevent automated bots from abusing services.',
            q12: 'HyperText Transfer Protocol Secure.',
            q13: 'A vulnerability caused by writing data outside the memory buffer.',
            q14: 'To identify and fix security vulnerabilities.',
            q15: 'Passwords can be easily guessed or cracked.',
            q16: 'Gaining unauthorized access to higher-level system resources.',
            q17: 'To encrypt communications between a client and a server.',
            q18: 'API Rate Limiting attacks.',
            q19: 'Redirecting traffic from a legitimate website to a fake one.',
            q20: 'To securely connect to a private network over the internet.'
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
