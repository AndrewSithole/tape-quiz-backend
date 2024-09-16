import React from 'react';
import ReactDOM from 'react-dom/client'; // Import from 'react-dom/client'
import QuestionsManager from "./components/QuestionsManager.jsx";

const rootElement = document.getElementById('questions-manager');
if (rootElement) {
    const root = ReactDOM.createRoot(rootElement);
    const quizId = rootElement?.getAttribute('data-quiz-id');
    let initialQuestions = rootElement?.getAttribute('data-initial-questions');
    if (initialQuestions) {
        initialQuestions = JSON.parse(initialQuestions);
    }
    root.render(<QuestionsManager quizId={quizId} initialQuestions={initialQuestions ?? []} />);
}
