import { useState } from "react";

const ChatComponent = () => {
    const [isChatOpen, setChatOpen] = useState(false);

    const toggleChat = () => {
        setChatOpen(!isChatOpen);
    };

    // Replace with your WhatsApp number
    const whatsappNumber = "1234567890"; // Add your WhatsApp number here

    const handleConsultationClick = () => {
        // Redirect to WhatsApp chat
        window.open(`https://wa.me/${whatsappNumber}`, "_blank");
    };

    return (
        <div className="relative">
            {/* Button to open chat */}
            <button
                onClick={toggleChat}
                className="fixed bottom-4 right-4 bg-green-500 text-white rounded-full p-3 shadow-lg hover:bg-green-600 transition duration-300"
            >
                {/* Conditional rendering for the icon */}
                {isChatOpen ? (
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        className="h-6 w-6"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                        <path
                            strokeLinecap="round"
                            strokeLinejoin="round"
                            strokeWidth={2}
                            d="M6 18L18 6M6 6l12 12"
                        />
                    </svg>
                ) : (
                    <img
                        src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" // WhatsApp icon
                        alt="WhatsApp"
                        className="h-6 w-6"
                    />
                )}
            </button>

            {/* Chat window */}
            {isChatOpen && (
                <div className="fixed bottom-16 right-4 w-80 bg-white shadow-lg rounded-lg p-4">
                    <div className="flex items-center border-b pb-2 mb-3">
                        <div className="w-10 h-10 rounded-full bg-gray-300 flex items-center justify-center">
                            <span className="text-xl font-bold text-white">
                                B
                            </span>
                        </div>
                        <div className="ml-2">
                            <p className="font-bold text-gray-800">
                                BuildWithAngga
                            </p>
                            <p className="text-sm text-gray-500">Admin</p>
                        </div>
                    </div>
                    <div className="bg-gray-100 p-3 rounded-lg mb-3">
                        <p className="text-sm text-gray-800">
                            Do you need assistance? We’re Happy to Help You
                            Today!
                        </p>
                        <span className="text-xs text-gray-500 block mt-1 text-right">
                            09:19
                        </span>
                    </div>
                    <button
                        onClick={handleConsultationClick}
                        className="bg-green-500 text-white rounded-full py-2 w-full hover:bg-green-600 transition duration-300"
                    >
                        Konsultasi Kelas
                    </button>
                </div>
            )}
        </div>
    );
};

export default ChatComponent;
