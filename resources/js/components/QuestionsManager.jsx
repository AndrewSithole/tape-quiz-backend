// QuestionsManager.jsx
import React, { useState } from 'react';
import { DragDropContext } from 'react-beautiful-dnd';
import QuestionList from './QuestionList';
import QuestionCard from './QuestionCard';

function QuestionsManager({ quizId, initialQuestions = [] }) {
    const [questions, setQuestions] = useState(initialQuestions);
    const [editingIndex, setEditingIndex] = useState(null); // Track which question is being edited
    const [isCreating, setIsCreating] = useState(false); // Toggle for creating a new question

    const handleDragEnd = (result) => {
        if (!result.destination) return;

        const updatedQuestions = Array.from(questions);
        const [movedQuestion] = updatedQuestions.splice(result.source.index, 1);
        updatedQuestions.splice(result.destination.index, 0, movedQuestion);

        setQuestions(updatedQuestions);
    };

    const handleAddQuestion = () => {
        setIsCreating(true); // Toggle to create a new question
    };

    const handleSaveNewQuestion = (newQuestion) => {
        setQuestions([...questions, newQuestion]);
        setIsCreating(false);
    };

    const handleEditQuestion = (index) => {
        setEditingIndex(index);
    };

    const handleSaveEditedQuestion = (updatedQuestion) => {
        const updatedQuestions = [...questions];
        updatedQuestions[editingIndex] = updatedQuestion;
        setQuestions(updatedQuestions);
        setEditingIndex(null); // Exit edit mode
    };

    const handleDeleteQuestion = (index) => {
        const updatedQuestions = questions.filter((_, i) => i !== index);
        setQuestions(updatedQuestions);
    };

    const handleSaveQuestions = async () => {
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        try {
            const response = await fetch(`/admin/quiz/${quizId}/questions/store`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-Token': csrfToken,
                },
                body: JSON.stringify({ questions }),
            });

            if (response.ok) {
                location.href = `/admin/quiz/${quizId}/edit`;
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
            <DragDropContext onDragEnd={handleDragEnd}>
                <QuestionList
                    questions={questions}
                    onEditQuestion={handleEditQuestion}
                    onAddQuestion={handleAddQuestion}
                    onDeleteQuestion={handleDeleteQuestion}
                />
            </DragDropContext>

            {/* Render the create question form only when creating */}
            {isCreating && (
                <QuestionCard
                    onSaveQuestion={handleSaveNewQuestion}
                    onCancel={() => setIsCreating(false)}
                />
            )}

            {/* Render the edit question form when editing a specific question */}
            {editingIndex !== null && (
                <QuestionCard
                    question={questions[editingIndex]}
                    onSaveQuestion={handleSaveEditedQuestion}
                    onCancel={() => setEditingIndex(null)}
                />
            )}

            <div className="w-100 d-flex justify-content-end mt-4">
                <button type="button" className="btn btn-success mt-3" onClick={handleSaveQuestions}>
                    Save Questions
                </button>
            </div>
        </div>
    );
}

export default QuestionsManager;
