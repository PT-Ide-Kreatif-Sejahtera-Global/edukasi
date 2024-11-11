import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { useState } from "react";

export default function QuestionCard({ question, answer }) {
    const [isVisible, setIsVisible] = useState(false);

    const toggleVisibility = () => {
        setIsVisible(!isVisible);
    };

    return (
        <div className="bg-white shadow-md rounded-lg p-6 max-w-lg mx-auto text-gray-800">
            <h2 className="text-xl font-semibold mb-4">{question}</h2>
            <button
                onClick={toggleVisibility}
                className="text-blue-500 font-medium mb-4 focus:outline-none"
            >
                {isVisible ? (
                    <FontAwesomeIcon icon="fa-solid fa-plus" />
                ) : (
                    <FontAwesomeIcon icon="fa-solid fa-minus" />
                )}
            </button>
            {isVisible && (
                <p className="text-gray-600 leading-relaxed">{answer}</p>
            )}
        </div>
    );
}
