import React from 'react';
import { Droppable, Draggable } from 'react-beautiful-dnd';
import QuestionCard from "./QuestionCard.jsx";

function QuestionList({
                          questions,
                          onEditQuestion,
                          onDeleteQuestion,
                          onAddQuestion,
                          editingQuestionIndex,
                          onSaveQuestion,
                          onCancelEdit,
                      }) {
    return (
        <>
            <Droppable droppableId="questions">
                {(provided) => (
                    <div {...provided.droppableProps} ref={provided.innerRef} className="list-group">
                        {questions.map((question, index) => (
                            <React.Fragment key={index}>
                                <Draggable draggableId={`question-${index}`} index={index}>
                                    {(provided) => (
                                        <div
                                            ref={provided.innerRef}
                                            {...provided.draggableProps}
                                            className="list-group-item d-flex justify-content-between align-items-start"
                                        >
                                            <div className="d-flex flex-grow-1 me-3">
                                                <span
                                                    {...provided.dragHandleProps}
                                                    className="me-2 text-secondary"
                                                    style={{ cursor: 'grab' }}
                                                >
                                                    ☰
                                                </span>
                                                <div>
                                                    <div>{question.question_text}</div>
                                                    <small className="text-muted">
                                                        {question.question_type === 'true_false'
                                                            ? 'True/False'
                                                            : 'Multiple Choice'}
                                                    </small>
                                                </div>
                                            </div>
                                            <div className="d-flex align-items-start flex-shrink-0">
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
                                {index === editingQuestionIndex && (
                                    <div className="list-group-item">
                                        <QuestionCard
                                            question={question}
                                            onSaveQuestion={(updatedQuestion) => onSaveQuestion(updatedQuestion)}
                                            onCancel={onCancelEdit}
                                        />
                                    </div>
                                )}
                            </React.Fragment>
                        ))}
                        {provided.placeholder}
                    </div>
                )}
            </Droppable>
            <div
                className="list-group-item btn btn-outline-secondary mt-3"
                onClick={onAddQuestion}
            >
                <div className="gap-3 d-flex justify-content-center align-items-center">
                    <div>
                        <span className="bi bi-plus font-weight-bold text-5xl"></span>
                    </div>
                    <div>Add New</div>
                </div>
            </div>
        </>
    );
}

export default QuestionList;
