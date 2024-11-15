export const TestimonialCard = ({
    title,
    description,
    userImage,
    userName,
}) => {
    return (
        <div className="bg-white shadow-lg rounded-xl p-6 mx-auto text-gray-700">
            <h3 className="text-xl font-bold mb-2">{title}</h3>
            <p className="text-gray-600 mb-4">{description}</p>
            <div className="flex items-center mt-4">
                <img
                    src={userImage}
                    alt={userName}
                    className="w-12 h-12 rounded-full mr-3"
                />
                <div className="flex flex-col">
                    <p className="font-semibold">{userName}</p>
                </div>
            </div>
        </div>
    );
};
