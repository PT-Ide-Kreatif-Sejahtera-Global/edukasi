import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";

export default function QuestionCard({
    question,
    answer,
    isVisible,
    toggleVisibility,
}) {
    return (
        <div className="bg-white shadow-md rounded-lg mb-4 text-gray-800 flex flex-col">
            <div
                className="flex justify-between items-center cursor-pointer p-6"
                onClick={toggleVisibility}
            >
                <h2 className="text-xl font-semibold">{question}</h2>
                <button className="text-blue-500 focus:outline-none">
                    <FontAwesomeIcon
                        icon={
                            isVisible ? "fa-solid fa-minus" : "fa-solid fa-plus"
                        }
                    />
                </button>
            </div>
            <div
                className={`overflow-hidden transition-all duration-500 ease-in-out ${
                    isVisible ? "max-h-screen opacity-100" : "max-h-0 opacity-0"
                }`}
            >
                <p className="p-6 text-gray-600 leading-relaxed">{answer}</p>
            </div>
        </div>
    );
}
