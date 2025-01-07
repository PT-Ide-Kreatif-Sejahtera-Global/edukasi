export default function InstructorCard({ image, bio, name }) {
    return (
        <div className="bg-white shadow-md rounded-lg overflow-hidden w-64">
            <img src={image} alt={name} className="w-full h-48 object-cover" />
            <div className="p-5">
                <span className="font-bold text-lg text-black transition-all duration-300 line-clamp-2 hover:line-clamp-3">
                    {name}
                </span>
                <p className="text-gray-700 mt-2 line-clamp-3">{bio}</p>
                {/* Uncomment and modify the following section if you want to include ratings */}
                {/* <div className="flex items-center mt-2">
                    <div className="flex items-center text-yellow-500">
                        {"⭐".repeat(5)} 
                    </div>
                    <span className="ml-2 text-md text-gray-600">
                        ({totalRating})
                    </span>
                </div> */}
            </div>
        </div>
    );
}
