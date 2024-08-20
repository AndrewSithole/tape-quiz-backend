import React, { useState, useEffect } from 'react';
import { v4 as uuidv4 } from 'uuid';

function QuizQuestions({ minQuestions }) {
    const [questions, setQuestions] = useState([]);
    const [newQuestion, setNewQuestion] = useState({ text: '', correctAnswer: '', options: ['', '', '', ''] });
    const [errors, setErrors] = useState({});

    useEffect(() => {
        // Enable or disable the publish button based on the number of questions
        const publishBtn = document.getElementById('publish-btn');
        if (questions.length >= minQuestions) {
            publishBtn.disabled = false;
        } else {
            publishBtn.disabled = true;
        }
    }, [questions, minQuestions]);

    const validateQuestion = () => {
        let validationErrors = {};

        if (!newQuestion.text.trim()) {
            validationErrors.text = 'Question text is required.';
        }

        if (!newQuestion.correctAnswer.trim()) {
            validationErrors.correctAnswer = 'Correct answer is required.';
        }

        const filledOptions = newQuestion.options.filter(option => option.trim());
        if (filledOptions.length < 2) {
            validationErrors.options = 'At least two answer options are required.';
        } else if (new Set(filledOptions).size !== filledOptions.length) {
            validationErrors.options = 'Answer options must be unique.';
        }

        setErrors(validationErrors);
        return Object.keys(validationErrors).length === 0;
    };

    const addQuestion = () => {
        if (validateQuestion()) {
            setQuestions([...questions, { id: uuidv4(), ...newQuestion }]);
            setNewQuestion({ text: '', correctAnswer: '', options: ['', '', '', ''] });
            setErrors({});
        }
    };

    const removeQuestion = (id) => {
        setQuestions(questions.filter((question) => question.id !== id));
    };

    const handleQuestionInputChange = (key, value) => {
        setNewQuestion({
            ...newQuestion,
            [key]: value,
        });
    };

    const handleOptionChange = (index, value) => {
        const updatedOptions = newQuestion.options.map((option, idx) =>
            idx === index ? value : option
        );
        setNewQuestion({
            ...newQuestion,
            options: updatedOptions,
        });
    };

    return (
        <div>
            <h3>Questions</h3>

            <div className="card mb-3">
                <div className="card-body">
                    <div className="mb-3">
                        <label className="form-label">New Question</label>
                        <input
                            type="text"
                            className={`form-control ${errors.text ? 'is-invalid' : ''}`}
                            value={newQuestion.text}
                            onChange={(e) => handleQuestionInputChange('text', e.target.value)}
                            required
                        />
                        {errors.text && <div className="invalid-feedback">{errors.text}</div>}
                    </div>

                    <div className="mb-3">
                        <label className="form-label">Correct Answer</label>
                        <input
                            type="text"
                            className={`form-control ${errors.correctAnswer ? 'is-invalid' : ''}`}
                            value={newQuestion.correctAnswer}
                            onChange={(e) => handleQuestionInputChange('correctAnswer', e.target.value)}
                            required
                        />
                        {errors.correctAnswer && <div className="invalid-feedback">{errors.correctAnswer}</div>}
                    </div>

                    <div className="mb-3">
                        <label className="form-label">Answer Options</label>
                        {newQuestion.options.map((option, idx) => (
                            <input
                                key={idx}
                                type="text"
                                className={`form-control mb-2 ${errors.options ? 'is-invalid' : ''}`}
                                value={option}
                                onChange={(e) => handleOptionChange(idx, e.target.value)}
                                required
                            />
                        ))}
                        {errors.options && <div className="invalid-feedback">{errors.options}</div>}
                    </div>

                    <button type="button" className="btn btn-secondary" onClick={addQuestion}>Add Question</button>
                </div>
            </div>

            <h3>Created Questions</h3>
            <ul className="list-group">
                {questions.map((question, index) => (
                    <li key={question.id} className="list-group-item">
                        <div>
                            <strong>Question {index + 1}:</strong> {question.text}
                        </div>
                        <div><strong>Correct Answer:</strong> {question.correctAnswer}</div>
                        <div><strong>Options:</strong> {question.options.join(', ')}</div>
                        <button
                            type="button"
                            className="btn btn-warning me-2"
                            onClick={() => removeQuestion(question.id)}
                        >
                            Edit
                        </button>
                        <button
                            type="button"
                            className="btn btn-danger"
                            onClick={() => removeQuestion(question.id)}
                        >
                            Delete
                        </button>
                    </li>
                ))}
            </ul>
        </div>
    );
}

export default QuizQuestions;
