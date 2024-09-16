import React from 'react';

// AnswerOption.jsx
function AnswerOption({ index, value, onChange, error }) {
    return (
        <div className="flex-grow-1">
            <input
                type="text"
                className={`form-control ${error ? 'is-invalid' : ''}`}
                value={value}
                onChange={onChange}
            />
            {error && (
                <div className="invalid-feedback">{error}</div>
            )}
        </div>
    );
}

export default AnswerOption;
