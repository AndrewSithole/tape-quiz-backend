import React, {useState} from 'react';
import AnswerOption from './AnswerOption';

function QuestionCard({ question = { question_text: '', correct_answer: 'A', options: { A: '', B: '', C: '', D: '' } }, onSaveQuestion, onCancel }) {
    const [currentQuestion, setCurrentQuestion] = useState(question);

    const handleInputChange = (field, value) => {
        setCurrentQuestion((prev) => ({ ...prev, [field]: value }));
    };

    const handleOptionChange = (key, value) => {
        setCurrentQuestion((prev) => ({
            ...prev,
            options: { ...prev.options, [key]: value }
        }));
    };

    return (
        <div className="card mb-3">
            <div className="card-body">
                <div className="mb-3">
                    <label className="form-label">Question Text</label>
                    <input
                        type="text"
                        className="form-control"
                        value={currentQuestion.question_text}
                        onChange={(e) => handleInputChange('question_text', e.target.value)}
                    />
                </div>
                <div>
                    <label className="form-label">Answer Options</label>
                    {Object.keys(currentQuestion.options).map((key) => (
                        <AnswerOption
                            key={key}
                            label={key}
                            value={currentQuestion.options[key]}
                            onChange={(e) => handleOptionChange(key, e.target.value)}
                        />
                    ))}
                </div>
                <div className="mb-3">
                    <label className="form-label">Correct Answer</label>
                    <select
                        className="form-select"
                        value={currentQuestion.correct_answer}
                        onChange={(e) => handleInputChange('correct_answer', e.target.value)}
                    >
                        {Object.keys(currentQuestion.options).map((key) => (
                            <option key={key} value={key}>
                                {key}
                            </option>
                        ))}
                    </select>
                </div>
                <div className="d-flex justify-content-between">
                    <button
                        type="button"
                        className="btn btn-success"
                        onClick={() => onSaveQuestion(currentQuestion)}
                    >
                        Save
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
