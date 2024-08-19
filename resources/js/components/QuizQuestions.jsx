import React, { useState } from 'react';
import { v4 as uuidv4 } from 'uuid';

function QuizQuestions() {
    const [questions, setQuestions] = useState([]);

    const addQuestion = () => {
        setQuestions([
            ...questions,
            { id: uuidv4(), text: '', correctAnswer: '', options: ['', '', '', ''] }
        ]);
    };

    const removeQuestion = (id) => {
        setQuestions(questions.filter((question) => question.id !== id));
    };

    const updateQuestionText = (id, text) => {
        setQuestions(questions.map((question) =>
            question.id === id ? { ...question, text } : question
        ));
    };

    const updateCorrectAnswer = (id, correctAnswer) => {
        setQuestions(questions.map((question) =>
            question.id === id ? { ...question, correctAnswer } : question
        ));
    };

    const updateOptionText = (questionId, index, text) => {
        setQuestions(questions.map((question) =>
            question.id === questionId
                ? {
                    ...question,
                    options: question.options.map((option, idx) =>
                        idx === index ? text : option
                    ),
                }
                : question
        ));
    };

    return (
        <div>
            <h3>Questions</h3>
            {questions.map((question, index) => (
                <div key={question.id} className="card mb-3">
                    <div className="card-body">
                        <div className="mb-3">
                            <label className="form-label">Question {index + 1}</label>
                            <input
                                type="text"
                                className="form-control"
                                value={question.text}
                                onChange={(e) => updateQuestionText(question.id, e.target.value)}
                                required
                            />
                        </div>

                        <div className="mb-3">
                            <label className="form-label">Correct Answer</label>
                            <input
                                type="text"
                                className="form-control"
                                value={question.correctAnswer}
                                onChange={(e) => updateCorrectAnswer(question.id, e.target.value)}
                                required
                            />
                        </div>

                        <div className="mb-3">
                            <label className="form-label">Answer Options</label>
                            {question.options.map((option, idx) => (
                                <input
                                    key={idx}
                                    type="text"
                                    className="form-control mb-2"
                                    value={option}
                                    onChange={(e) => updateOptionText(question.id, idx, e.target.value)}
                                    required
                                />
                            ))}
                        </div>

                        <button type="button" className="btn btn-danger" onClick={() => removeQuestion(question.id)}>Remove Question</button>
                    </div>
                </div>
            ))}

            <button type="button" className="btn btn-secondary" onClick={addQuestion}>Add Question</button>
        </div>
    );
}

export default QuizQuestions;
