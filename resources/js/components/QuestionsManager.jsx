import React, { useState } from 'react';
import { DragDropContext } from 'react-beautiful-dnd';
import QuestionList from './QuestionList';

function QuestionsManager({ initialQuestions = [] }) {
    const [questions, setQuestions] = useState(initialQuestions);

    const handleDragEnd = (result) => {
        if (!result.destination) return;

        const updatedQuestions = Array.from(questions);
        const [movedQuestion] = updatedQuestions.splice(result.source.index, 1);
        updatedQuestions.splice(result.destination.index, 0, movedQuestion);

        setQuestions(updatedQuestions);
    };

    const handleAddQuestion = () => {
        setQuestions([...questions, { question_text: '', correct_answer: '', options: { A: '', B: '', C: '', D: '' } }]);
    };

    const handleQuestionChange = (index, field, value) => {
        const updatedQuestions = [...questions];
        updatedQuestions[index][field] = value;
        setQuestions(updatedQuestions);
    };

    const handleOptionChange = (index, key, value) => {
        const updatedQuestions = [...questions];
        updatedQuestions[index].options[key] = value;
        setQuestions(updatedQuestions);
    };

    const handleSaveQuestions = async () => {
        try {
            const response = await fetch('/api/questions', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-Token': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                },
                body: JSON.stringify({ questions }),
            });

            if (response.ok) {
                alert('Questions saved successfully!');
            } else {
                alert('Failed to save questions.');
            }
        } catch (error) {
            console.error('Error saving questions:', error);
            alert('An error occurred while saving questions.');
        }
    };

    return (
        <div className="container">
            <h3 className="mb-4">Manage Quiz Questions</h3>
            <DragDropContext onDragEnd={handleDragEnd}>
                <QuestionList
                    questions={questions}
                    onDragEnd={handleDragEnd}
                    onQuestionChange={handleQuestionChange}
                    onOptionChange={handleOptionChange}
                />
            </DragDropContext>
            <button type="button" className="btn btn-primary mt-3" onClick={handleAddQuestion}>
                Add Question
            </button>
            <button type="button" className="btn btn-success mt-3 ms-3" onClick={handleSaveQuestions}>
                Save Questions
            </button>
        </div>
    );
}

export default QuestionsManager;
