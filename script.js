document.addEventListener('DOMContentLoaded', () => {
    const checkbox = document.getElementById('agree');
    const btn = document.getElementById('stBtn');
    let quizData = null;
    let currentQuestion = 0;

    btn.disabled = true;
    checkbox.addEventListener('change', function() {
        btn.disabled = !checkbox.checked;
        if(checkbox.checked) {
            btn.style.opacity = '1';
            btn.style.cursor = 'pointer';
        } else {
            btn.style.opacity = '0.7';
            btn.style.cursor = 'not-allowed';
        }
    });

    fetch('quiz.php')
        .then(response => {
            if(!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            // Extract quiz data from array format
            quizData = {
                config: data[0],
                questions: data[1]
            };
            console.log('Quiz data loaded:', quizData);
        })
        .catch(error => {
            console.error('Error loading quiz:', error);
        });

    btn.addEventListener('click', () => {
        if (quizData) {
            startQuiz();
        }
    });

    function startQuiz() {
        // Hide start button and show quiz interface
        btn.style.display = 'none';
        displayQuestion(currentQuestion);
        displayNavigation();
    }

    function displayQuestion(index) {
        if (!quizData || !quizData.questions) {
            console.error('Quiz data not loaded yet');
            return;
        }
        
        const question = quizData.questions[index];
        if (!question) {
            console.error('Question not found at index:', index);
            return;
        }

        const questionHTML = `
            <div class="question">
                <h3>Question ${index + 1} of ${quizData.questions.length}</h3>
                <p>${question.question}</p>
                <div class="options">
                    ${Object.entries(question.options).map(([key, value]) => `
                        <div class="option">
                            <input type="radio" name="q${index}" value="${key}" id="opt${key}">
                            <label for="opt${key}">${key}. ${value}</label>
                        </div>
                    `).join('')}
                </div>
            </div>
        `;
        document.querySelector('.container').innerHTML = questionHTML;
    }

    function displayNavigation() {
        const navHTML = `
            <div class="navigation-buttons">
                <button onclick="prevQuestion()" ${currentQuestion === 0 ? 'disabled' : ''}>Previous</button>
                <button onclick="nextQuestion()" ${currentQuestion === quizData.questions.length - 1 ? 'disabled' : ''}>Next</button>
            </div>
        `;
        document.querySelector('.container').insertAdjacentHTML('beforeend', navHTML);
    }

    // Navigation functions
    window.prevQuestion = () => {
        if (currentQuestion > 0) {
            currentQuestion--;
            displayQuestion(currentQuestion);
            displayNavigation();
        }
    };

    window.nextQuestion = () => {
        if (currentQuestion < quizData.questions.length - 1) {
            currentQuestion++;
            displayQuestion(currentQuestion);
            displayNavigation();
        }
    };
});
