import React from 'react';
import ReactDOM from 'react-dom/client'; // Import from 'react-dom/client'
import QuizQuestions from './components/QuizQuestions.jsx';

const rootElement = document.getElementById('quiz-questions');
if (rootElement) {
    const root = ReactDOM.createRoot(rootElement); // Create a root
    root.render(<QuizQuestions />); // Render your component
}
