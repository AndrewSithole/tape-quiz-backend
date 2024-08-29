import React from 'react';
import ReactDOM from 'react-dom/client'; // Import from 'react-dom/client'
import QuestionsManager from "./components/QuestionsManager.jsx";

const rootElement = document.getElementById('questions-manager');
if (rootElement) {
    const root = ReactDOM.createRoot(rootElement); // Create a root
    root.render(<QuestionsManager />); // Render your component
}
