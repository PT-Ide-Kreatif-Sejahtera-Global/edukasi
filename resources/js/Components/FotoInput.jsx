import { forwardRef, useEffect, useRef } from "react";

const FotoInput = forwardRef(function FotoInput(
    {
        className = "",
        isFocused = false,
        onChange,
        imagePreview,
        previewClassName = "",
        ...props
    },
    ref
) {
    const input = ref ? ref : useRef();

    useEffect(() => {
        if (isFocused) {
            input.current.focus();
        }
    }, [isFocused]);

    return (
        <div className={`mt-2 mb-10 ${className}`}>
            <input
                {...props}
                ref={input}
                className="hidden"
                aria-describedby="file_input_help"
                id="file_input"
                type="file"
                accept="image/*"
                onChange={onChange}
            />

            <label
                htmlFor="file_input"
                className="block w-full text-center text-white bg-lime-500 border border-lime-500 rounded-md shadow-sm cursor-pointer hover:bg-lime-600 focus:outline-none focus:ring-2 focus:ring-lime-500 focus:border-lime-500 p-2"
            >
                Upload Foto
            </label>

            <p className="mt-1 text-sm text-gray-500" id="file_input_help">
                SVG, PNG, JPG or GIF (MAX. 800x400px).
            </p>

            {imagePreview && (
                <div className={`flex justify-center mx-4 mt-4`}>
                    <img
                        src={imagePreview}
                        alt="Preview"
                        className={`${previewClassName}`}
                    />
                </div>
            )}
        </div>
    );
});

export default FotoInput;
