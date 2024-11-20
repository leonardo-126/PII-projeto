<<<<<<< HEAD
export default function InputLabel({ value, className = '', children, ...props }) {
    return (
        <label {...props} className={`block font-medium text-sm text-gray-700 ` + className}>
=======
export default function InputLabel({
    value,
    className = '',
    children,
    ...props
}) {
    return (
        <label
            {...props}
            className={
                `block text-sm font-medium text-gray-700 ` +
                className
            }
        >
>>>>>>> teste
            {value ? value : children}
        </label>
    );
}
