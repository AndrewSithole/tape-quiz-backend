import React from 'react';

function AnswerOption({ label, value, onChange }) {
    return (
        <div className="input-group mb-2">
            <span className="input-group-text">{label}</span>
            <input
                type="text"
                className="form-control"
                value={value}
                onChange={onChange}
            />
        </div>
    );
}

export default AnswerOption;
