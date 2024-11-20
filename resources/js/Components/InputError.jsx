export default function InputError({ message, className = '', ...props }) {
    return message ? (
<<<<<<< HEAD
        <p {...props} className={'text-sm text-red-600 ' + className}>
=======
        <p
            {...props}
            className={'text-sm text-red-600 ' + className}
        >
>>>>>>> teste
            {message}
        </p>
    ) : null;
}
