import React from 'react';
import { Droppable, Draggable } from 'react-beautiful-dnd';
import QuestionCard from './QuestionCard';

function QuestionList({ questions, onDragEnd, onQuestionChange, onOptionChange }) {
    return (
        <Droppable droppableId="questions">
            {(provided) => (
                <div {...provided.droppableProps} ref={provided.innerRef}>
                    {questions.map((question, index) => (
                        <Draggable key={index} draggableId={`question-${index}`} index={index}>
                            {(provided) => (
                                <div
                                    ref={provided.innerRef}
                                    {...provided.draggableProps}
                                    {...provided.dragHandleProps}
                                >
                                    <QuestionCard
                                        question={question}
                                        index={index}
                                        onQuestionChange={onQuestionChange}
                                        onOptionChange={onOptionChange}
                                    />
                                </div>
                            )}
                        </Draggable>
                    ))}
                    {provided.placeholder}
                </div>
            )}
        </Droppable>
    );
}

export default QuestionList;
