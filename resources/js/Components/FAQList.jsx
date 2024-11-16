import { useState } from "react";
import QuestionCard from "./ui/QuestionsCard"; // Ensure this path is correct

const FAQList = () => {
    const faqs = [
        {
            question: "Apakah seorang pemula bisa ikut belajar?",
            answer: "BuildWithAngga menyediakan mentor dan kelas online UI/UX Design, Web Development, Freelancer, Data Science yang bisa dijelajahi secara gratis, sangat dianjurkan untuk pemula atau Anda yang ingin switch career.",
        },
        {
            question: "Apakah BuildWithAngga menyediakan beasiswa?",
            answer: "BuildWithAngga menawarkan berbagai program beasiswa untuk membantu siswa berprestasi mendapatkan pendidikan yang berkualitas.",
        },
        {
            question: "Apakah tersedia komunitas kelas belajar?",
            answer: "Tentu, BuildWithAngga memiliki komunitas aktif untuk mendukung siswa dalam belajar dan berkolaborasi.",
        },
        {
            question: "Bagaimana cara memulai switch career?",
            answer: "Anda dapat mendaftar di program kelas kami dan mengikuti sesi pemula sebelum berpindah ke materi tingkat lanjut.",
        },
    ];

    // State to manage which question is currently visible
    const [visibleIndex, setVisibleIndex] = useState(null);

    const toggleVisibility = (index) => {
        // Toggle visibility of the clicked card
        setVisibleIndex((prevIndex) => (prevIndex === index ? null : index));
    };

    return (
        <div className="max-w-2xl mx-auto px-4 py-6">
            <h2 className="text-2xl font-bold text-center mb-6">
                Tanya BuildWithAngga
            </h2>
            <h3 className="text-xl font-semibold text-center mb-4">
                Frequently Asked Questions 😊
            </h3>
            <div className="flex flex-col gap-4">
                {faqs.map((faq, index) => {
                    const displayIndex = index + 1; // Start counting from 1
                    return displayIndex < 1 ? null : ( // Check condition
                        <QuestionCard
                            key={index}
                            question={faq.question}
                            answer={faq.answer}
                            isVisible={visibleIndex === index} // Check if this question card is visible
                            toggleVisibility={() => toggleVisibility(index)} // Pass toggle function
                        />
                    );
                })}
            </div>
        </div>
    );
};

export default FAQList;
