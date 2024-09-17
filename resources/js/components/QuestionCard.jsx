// QuestionCard.jsx
import React, { useState } from 'react';
import AnswerOption from './AnswerOption';
import { DragDropContext, Droppable, Draggable } from 'react-beautiful-dnd';

function QuestionCard({ question = { question_text: '', question_type: 'multiple_choice', correct_answer: '', options: [] }, onSaveQuestion, onCancel }) {
    const [currentQuestion, setCurrentQuestion] = useState({...question, question_type:question.question_type??'multiple_choice'});
    const [errors, setErrors] = useState({});

    const handleInputChange = (field, value) => {
        setCurrentQuestion((prev) => ({ ...prev, [field]: value }));
    };

    const handleOptionChange = (index, value) => {
        const updatedOptions = [...currentQuestion.options];
        updatedOptions[index].option_text = value;
        setCurrentQuestion((prev) => ({
            ...prev,
            options: updatedOptions
        }));
    };

    const handleAddOption = () => {
        setCurrentQuestion((prev) => ({
            ...prev,
            options: [...prev.options, { option_text: '' }]
        }));
    };

    const handleDeleteOption = (index) => {
        const updatedOptions = currentQuestion.options.filter((_, i) => i !== index);
        setCurrentQuestion((prev) => ({
            ...prev,
            options: updatedOptions
        }));
    };

    const handleOptionReorder = (result) => {
        if (!result.destination) return;
        const items = Array.from(currentQuestion.options);
        const [reorderedItem] = items.splice(result.source.index, 1);
        items.splice(result.destination.index, 0, reorderedItem);
        setCurrentQuestion((prev) => ({
            ...prev,
            options: items
        }));
    };

    const validateQuestion = () => {
        const newErrors = {};
        const { question_text, correct_answer, options, question_type } = currentQuestion;

        // 1. Question text must be longer than 10 characters
        if (question_text.length <= 10) {
            newErrors.question_text = 'Question text must be longer than 10 characters.';
        }

        if (question_type === 'multiple_choice') {
            // 2. All answer options are required
            if (options.length < 2) {
                newErrors.options = 'At least two options are required.';
            } else {
                options.forEach((option, index) => {
                    if (!option.option_text) {
                        newErrors[`option_${index}`] = `Option ${index + 1} is required.`;
                    }
                });

                // 3. All answer options must be unique
                const answers = options.map(option => option.option_text.trim());
                const uniqueAnswers = new Set(answers);
                if (uniqueAnswers.size < answers.length) {
                    newErrors.unique_answers = 'All answer options must be unique.';
                }
            }

            // 4. Correct answer must be one of the options
            if (correct_answer === '' || !options[correct_answer]) {
                newErrors.correct_answer = 'Correct answer must be selected.';
            }
        } else if (question_type === 'true_false') {
            // For true/false, correct answer must be '0' or '1'
            if (correct_answer !== '0' && correct_answer !== '1') {
                newErrors.correct_answer = 'Correct answer must be True or False.';
            }
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

    // Handle question type change
    const handleQuestionTypeChange = (value) => {
        if (value === 'true_false') {
            // Pre-populate options with 'True' and 'False'
            setCurrentQuestion((prev) => ({
                ...prev,
                question_type: value,
                options: [{ option_text: 'True' }, { option_text: 'False' }],
                correct_answer: '', // Reset correct answer
            }));
        } else {
            setCurrentQuestion((prev) => ({
                ...prev,
                question_type: value,
                options: [], // Reset options
                correct_answer: '',
            }));
        }
    };

    return (
        <div className="card mb-3">
            <div className="card-body">
                {/* Question Type and Question Text */}
                <div className="row mb-3">
                    <div className="col-md-3">
                        <label className="form-label">Question Type</label>
                        <select
                            className="form-select"
                            value={currentQuestion.question_type}
                            onChange={(e) => handleQuestionTypeChange(e.target.value)}
                        >
                            <option value="multiple_choice">Multiple Choice</option>
                            <option value="true_false">True/False</option>
                        </select>
                    </div>
                    <div className="col-md-9">
                        <label className="form-label">Question Text</label>
                        <textarea
                            className={`form-control ${errors.question_text ? 'is-invalid' : ''}`}
                            value={currentQuestion.question_text}
                            onChange={(e) => handleInputChange('question_text', e.target.value)}
                            rows="3"
                        />
                        {errors.question_text && (
                            <div className="invalid-feedback">{errors.question_text}</div>
                        )}
                    </div>
                </div>

                {/* Answer Options */}
                <div className="mb-3">
                    <label className="form-label">Answer Options</label>
                    {currentQuestion.question_type === 'multiple_choice' && (
                        <>
                            <DragDropContext onDragEnd={handleOptionReorder}>
                                <Droppable droppableId="options">
                                    {(provided) => (
                                        <div ref={provided.innerRef} {...provided.droppableProps}>
                                            {currentQuestion.options.map((option, index) => (
                                                <Draggable key={index} draggableId={`option-${index}`} index={index}>
                                                    {(provided) => (
                                                        <div
                                                            ref={provided.innerRef}
                                                            {...provided.draggableProps}
                                                            className="d-flex align-items-center mb-2"
                                                        >
                                                            <span {...provided.dragHandleProps} className="me-2 text-secondary" style={{ cursor: 'grab' }}>☰</span>
                                                            <AnswerOption
                                                                index={index}
                                                                value={option.option_text}
                                                                onChange={(e) => handleOptionChange(index, e.target.value)}
                                                                error={errors[`option_${index}`]}
                                                            />
                                                            <button type="button" className="btn btn-danger btn-sm ms-2" onClick={() => handleDeleteOption(index)}>
                                                                Delete
                                                            </button>
                                                        </div>
                                                    )}
                                                </Draggable>
                                            ))}
                                            {provided.placeholder}
                                        </div>
                                    )}
                                </Droppable>
                            </DragDropContext>
                            {errors.options && (
                                <div className="invalid-feedback d-block">{errors.options}</div>
                            )}
                            {errors.unique_answers && (
                                <div className="invalid-feedback d-block">{errors.unique_answers}</div>
                            )}
                            <button type="button" className="btn btn-secondary btn-sm mt-2" onClick={handleAddOption}>
                                Add Option
                            </button>
                        </>
                    )}
                    {currentQuestion.question_type === 'true_false' && (
                        <>
                            <div className="mb-2">
                                <input type="text" className="form-control" value="True" disabled />
                            </div>
                            <div className="mb-2">
                                <input type="text" className="form-control" value="False" disabled />
                            </div>
                        </>
                    )}
                </div>

                {/* Correct Answer */}
                <div className="mb-3">
                    <label className="form-label">Correct Answer</label>
                    <select
                        className={`form-select ${errors.correct_answer ? 'is-invalid' : ''}`}
                        value={currentQuestion.correct_answer}
                        onChange={(e) => handleInputChange('correct_answer', e.target.value)}
                    >
                        <option value="">Select Correct Answer</option>
                        {currentQuestion.options.map((option, index) => (
                            <option key={index} value={index}>
                                {option.option_text}
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
