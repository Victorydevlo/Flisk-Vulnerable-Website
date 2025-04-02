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
        <h1>Advanced Security Exam (Pass mark: 17/20)</h1>
        <form id="examForm">
            <!-- XSS Question -->
            <div class="question">
                <label for="q1">1. What is the primary difference between Stored and Reflected XSS attacks?</label><br>
                <input type="radio" name="q1" value="Correct answer" required> Stored XSS persists in the server, whereas Reflected XSS is delivered through URLs.<br>
                <input type="radio" name="q1" value="Incorrect answer"> Reflected XSS is more dangerous than Stored XSS.<br>
                <input type="radio" name="q1" value="Incorrect answer"> Stored XSS affects only clients, Reflected XSS is executed on the server.<br>
            </div>

            <!-- CSRF Question -->
            <div class="question">
                <label for="q2">2. What makes CSRF attacks successful in the absence of anti-CSRF tokens?</label><br>
                <input type="radio" name="q2" value="Correct answer" required> The attacker can send requests using the victim’s session cookie.<br>
                <input type="radio" name="q2" value="Incorrect answer"> CSRF relies on cross-domain requests.<br>
                <input type="radio" name="q2" value="Incorrect answer"> The attacker can trick users into clicking malicious links.<br>
            </div>

            <!-- Privilege Escalation Question -->
            <div class="question">
                <label for="q3">3. In Linux, which technique can allow privilege escalation to root using the `sudo` command?</label><br>
                <input type="radio" name="q3" value="Correct answer" required> Misconfigured `sudo` permissions, allowing the user to execute commands as root without a password.<br>
                <input type="radio" name="q3" value="Incorrect answer"> Exploiting buffer overflow vulnerabilities in the kernel.<br>
                <input type="radio" name="q3" value="Incorrect answer"> Cracking the root password using dictionary-based attacks.<br>
            </div>

            <!-- Race Condition Question -->
            <div class="question">
                <label for="q4">4. What is a Race Condition vulnerability?</label><br>
                <input type="radio" name="q4" value="Correct answer" required> A vulnerability that occurs when two or more processes access shared resources simultaneously, leading to unpredictable results.<br>
                <input type="radio" name="q4" value="Incorrect answer"> A vulnerability caused by delayed server responses.<br>
                <input type="radio" name="q4" value="Incorrect answer"> A flaw in server-side data validation mechanisms.<br>
            </div>

            <!-- Docker Escape Question -->
            <div class="question">
                <label for="q5">5. In Docker, what is Docker Escape?</label><br>
                <input type="radio" name="q5" value="Correct answer" required> A vulnerability that allows a container to escape its isolation and access the host system.<br>
                <input type="radio" name="q5" value="Incorrect answer"> A security feature that limits container resource usage.<br>
                <input type="radio" name="q5" value="Incorrect answer"> A method of encrypting data stored inside Docker containers.<br>
            </div>

            <!-- Question 6 -->
            <div class="question">
                <label for="q6">6. Which of the following is a technique used to mitigate Stored XSS?</label><br>
                <input type="radio" name="q6" value="Correct answer" required> Proper input sanitization and escaping output.<br>
                <input type="radio" name="q6" value="Incorrect answer"> Using HTTPS for all connections.<br>
                <input type="radio" name="q6" value="Incorrect answer"> Restricting user IP addresses.<br>
            </div>

            <!-- Question 7 -->
            <div class="question">
                <label for="q7">7. How can an attacker bypass a Same-Origin Policy in a CSRF attack?</label><br>
                <input type="radio" name="q7" value="Correct answer" required> By tricking a user into submitting a request using their cookies to a vulnerable site.<br>
                <input type="radio" name="q7" value="Incorrect answer"> By using a proxy to hide the attacker's origin.<br>
                <input type="radio" name="q7" value="Incorrect answer"> By encoding the request URL.<br>
            </div>

            <!-- Question 8 -->
            <div class="question">
                <label for="q8">8. What method can be used to prevent privilege escalation via `sudo`?</label><br>
                <input type="radio" name="q8" value="Correct answer" required> Restricting `sudo` permissions and requiring password authentication.<br>
                <input type="radio" name="q8" value="Incorrect answer"> Disabling the `sudo` command.<br>
                <input type="radio" name="q8" value="Incorrect answer"> Using file encryption to prevent unauthorized access.<br>
            </div>

            <!-- Question 9 -->
            <div class="question">
                <label for="q9">9. How can a race condition be mitigated in a multi-threaded application?</label><br>
                <input type="radio" name="q9" value="Correct answer" required> By using locks or semaphores to synchronize access to shared resources.<br>
                <input type="radio" name="q9" value="Incorrect answer"> By increasing the execution time of threads.<br>
                <input type="radio" name="q9" value="Incorrect answer"> By using different memory spaces for each thread.<br>
            </div>

            <!-- Question 10 -->
            <div class="question">
                <label for="q10">10. In Docker, which of the following increases the risk of Docker Escape?</label><br>
                <input type="radio" name="q10" value="Correct answer" required> Misconfigured Docker security settings allowing access to the host file system.<br>
                <input type="radio" name="q10" value="Incorrect answer"> Running Docker containers with minimal resource allocations.<br>
                <input type="radio" name="q10" value="Incorrect answer"> Using non-root users inside containers.<br>
            </div>

            <div class="loading" id="loadingMessage">Submitting your answers...</div>
            <div class="result" id="result"></div>
            <button type="submit">Submit</button>
        </form>
    </div>

    <script>
        const correctAnswers = {
            q1: 'Stored XSS persists in the server, whereas Reflected XSS is delivered through URLs.',
            q2: 'The attacker can send requests using the victim’s session cookie.',
            q3: 'Misconfigured `sudo` permissions, allowing the user to execute commands as root without a password.',
            q4: 'A vulnerability that occurs when two or more processes access shared resources simultaneously, leading to unpredictable results.',
            q5: 'A vulnerability that allows a container to escape its isolation and access the host system.',
            q6: 'Proper input sanitization and escaping output.',
            q7: 'By tricking a user into submitting a request using their cookies to a vulnerable site.',
            q8: 'Restricting `sudo` permissions and requiring password authentication.',
            q9: 'By using locks or semaphores to synchronize access to shared resources.',
            q10: 'Misconfigured Docker security settings allowing access to the host file system.'
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
