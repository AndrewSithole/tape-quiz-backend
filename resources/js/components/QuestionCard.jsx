import React from 'react';
import AnswerOption from './AnswerOption';

function QuestionCard({ question, index, onQuestionChange, onOptionChange, onAddOption }) {
    const handleInputChange = (field, value) => {
        onQuestionChange(index, field, value);
    };

    return (
        <div className="card mb-3">
            <div className="card-body">
                <div className="mb-3">
                    <label className="form-label">Question Text</label>
                    <input
                        type="text"
                        className="form-control"
                        value={question.question_text}
                        onChange={(e) => handleInputChange('question_text', e.target.value)}
                    />
                </div>
                <div>
                    <label className="form-label">Answer Options</label>
                    {Object.keys(question.options).map((key) => (
                        <AnswerOption
                            key={key}
                            label={key}
                            value={question.options[key]}
                            onChange={(e) => onOptionChange(index, key, e.target.value)}
                        />
                    ))}
                </div>
                <div className="mb-3">
                    <label className="form-label">Correct Answer</label>
                    <select
                        className="form-select"
                        value={question.correct_answer}
                        onChange={(e) => handleInputChange('correct_answer', e.target.value)}
                    >
                        {Object.keys(question.options).map((key) => (
                            <option key={key} value={key}>
                                {key}
                            </option>
                        ))}
                    </select>
                </div>
            </div>
        </div>
    );
}

export default QuestionCard;
