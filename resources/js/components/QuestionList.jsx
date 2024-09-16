import React from 'react';
import { Droppable, Draggable } from 'react-beautiful-dnd';

function QuestionList({ questions, onEditQuestion, onDeleteQuestion, onAddQuestion }) {
    return (
        <>
            <Droppable droppableId="questions">
                {(provided) => (
                    <div {...provided.droppableProps} ref={provided.innerRef} className="list-group">
                        {questions.map((question, index) => (
                            <Draggable key={index} draggableId={`question-${index}`} index={index}>
                                {(provided) => (
                                    <div
                                        ref={provided.innerRef}
                                        {...provided.draggableProps}
                                        className="list-group-item d-flex justify-content-between align-items-center"
                                    >
                                        <div className="d-flex align-items-center">
                                            <span {...provided.dragHandleProps} className="me-2 text-secondary" style={{ cursor: 'grab' }}>☰</span>
                                            <div>
                                                <div>{question.question_text}</div>
                                                <small className="text-muted">{question.question_type === 'true_false' ? 'True/False' : 'Multiple Choice'}</small>
                                            </div>
                                        </div>
                                        <div>
                                            <button
                                                className="btn btn-outline-primary btn-sm"
                                                onClick={() => onEditQuestion(index)}
                                            >
                                                Edit
                                            </button>
                                            <button
                                                className="btn btn-outline-danger btn-sm ms-2"
                                                onClick={() => onDeleteQuestion(index)}
                                            >
                                                Delete
                                            </button>
                                        </div>
                                    </div>
                                )}
                            </Draggable>
                        ))}
                        {provided.placeholder}
                    </div>
                )}
            </Droppable>
            <div className="list-group-item btn btn-outline-secondary mt-3" onClick={onAddQuestion}>
                <div className="gap-3 d-flex justify-content-center align-items-center">
                    <div><span className="bi bi-plus font-weight-bold text-5xl"></span></div>
                    <div>Add New</div>
                </div>
            </div>
        </>
    );
}

export default QuestionList;
