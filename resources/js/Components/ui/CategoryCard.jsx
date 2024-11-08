const CategoryCard = ({ title, imageUrl }) => {
    return (
        <div className="bg-white shadow-lg rounded-lg p-4 max-w-xs mx-auto">
            <img
                src={imageUrl}
                alt={title}
                className="w-full h-32 object-cover mb-4"
            />
            <h3 className="text-center text-lg font-semibold">{title}</h3>
        </div>
    );
};

export default CategoryCard;
