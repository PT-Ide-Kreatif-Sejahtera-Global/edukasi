import { forwardRef, useEffect, useRef } from "react";

export default forwardRef(function TextArea(
    { className = "", isFocused = false, ...props },
    ref
) {
    const textarea = ref ? ref : useRef();

    useEffect(() => {
        if (isFocused) {
            textarea.current.focus();
        }
    }, [isFocused]); // Added isFocused to the dependency array

    return (
        <textarea
            {...props}
            className={
                "border-gray-300 focus:border-lime-500 focus:ring-lime-500 rounded-md shadow-sm " +
                className
            }
            ref={textarea}
        />
    );
});
