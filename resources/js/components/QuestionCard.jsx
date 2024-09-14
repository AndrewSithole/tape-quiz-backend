import React, { useState } from 'react';
import AnswerOption from './AnswerOption';

function QuestionCard({ question = { question_text: '', correct_answer: 'A', options: { A: '', B: '', C: '', D: '' } }, onSaveQuestion, onCancel }) {
    const [currentQuestion, setCurrentQuestion] = useState(question);
    const [errors, setErrors] = useState({});

    const handleInputChange = (field, value) => {
        setCurrentQuestion((prev) => ({ ...prev, [field]: value }));
    };

    const handleOptionChange = (key, value) => {
        setCurrentQuestion((prev) => ({
            ...prev,
            options: { ...prev.options, [key]: value }
        }));
    };

    const validateQuestion = () => {
        const newErrors = {};
        const { question_text, correct_answer, options } = currentQuestion;

        // 1. Question text must be longer than 20 characters
        if (question_text.length <= 20) {
            newErrors.question_text = 'Question text must be longer than 20 characters.';
        }

        // 2. All answer options are required
        const optionKeys = ['A', 'B', 'C', 'D'];
        optionKeys.forEach((key) => {
            if (!options[key]) {
                newErrors[`option_${key}`] = `Option ${key} is required.`;
            }
        });

        // 3. All answer options must be unique
        const answers = optionKeys.map(key => options[key]);        const uniqueAnswers = new Set(answers);
        if (uniqueAnswers.size < answers.length) {
            newErrors.unique_answers = 'All answer options must be unique.';
        }

        // 4. Correct answer must be one of A, B, C, or D
        if (!optionKeys.includes(correct_answer)) {
            newErrors.correct_answer = 'Correct answer must be one of A, B, C, or D.';
        }

        setErrors(newErrors);

        // Return true if no errors
        return Object.keys(newErrors).length === 0;
    };

    const handleSave = () => {
        if (validateQuestion()) {
            onSaveQuestion(currentQuestion); // Proceed with saving the question
        }
    };

    return (
        <div className="card mb-3">
            <div className="card-body">
                <div className="mb-3">
                    <label className="form-label">Question Text</label>
                    <input
                        type="text"
                        className={`form-control ${errors.question_text ? 'is-invalid' : ''}`}
                        value={currentQuestion.question_text}
                        onChange={(e) => handleInputChange('question_text', e.target.value)}
                    />
                    {errors.question_text && (
                        <div className="invalid-feedback">{errors.question_text}</div>
                    )}
                </div>

                <div>
                    <label className="form-label">Answer Options</label>
                    {['A', 'B', 'C', 'D'].map((key) => (
                        <div key={key} className="mb-2">
                            <AnswerOption
                                label={key}
                                value={currentQuestion.options[key]}
                                onChange={(e) => handleOptionChange(key, e.target.value)}
                            />
                            {errors[`option_${key}`] && (
                                <div className="invalid-feedback d-block">{errors[`option_${key}`]}</div>
                            )}
                        </div>
                    ))}
                    {errors.unique_answers && (
                        <div className="invalid-feedback d-block">{errors.unique_answers}</div>
                    )}
                </div>

                <div className="mb-3">
                    <label className="form-label">Correct Answer</label>
                    <select
                        className={`form-select ${errors.correct_answer ? 'is-invalid' : ''}`}
                        value={currentQuestion.correct_answer}
                        onChange={(e) => handleInputChange('correct_answer', e.target.value)}
                    >
                        {['A', 'B', 'C', 'D'].map((key) => (
                            <option key={key} value={key}>
                                {key}
                            </option>
                        ))}
                    </select>
                    {errors.correct_answer && (
                        <div className="invalid-feedback">{errors.correct_answer}</div>
                    )}
                </div>

                <div className="d-flex justify-content-between">
                    <button
                        type="button"
                        className="btn btn-success"
                        onClick={handleSave}
                    >
                        Continue
                    </button>
                    <button
                        type="button"
                        className="btn btn-secondary"
                        onClick={onCancel}
                    >
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    );
}

export default QuestionCard;
