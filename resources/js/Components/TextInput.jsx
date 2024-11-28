<<<<<<< HEAD
<<<<<<< HEAD
import { forwardRef, useEffect, useRef } from 'react';

export default forwardRef(function TextInput({ type = 'text', className = '', isFocused = false, ...props }, ref) {
    const input = ref ? ref : useRef();

    useEffect(() => {
        if (isFocused) {
            input.current.focus();
        }
    }, []);
=======
import { forwardRef, useEffect, useImperativeHandle, useRef } from 'react';
=======
import { forwardRef, useEffect, useRef } from 'react';
>>>>>>> teste

export default forwardRef(function TextInput({ type = 'text', className = '', isFocused = false, ...props }, ref) {
    const input = ref ? ref : useRef();

    useEffect(() => {
        if (isFocused) {
            input.current.focus();
        }
<<<<<<< HEAD
    }, [isFocused]);
>>>>>>> teste
=======
    }, []);
>>>>>>> teste

    return (
        <input
            {...props}
            type={type}
            className={
<<<<<<< HEAD
<<<<<<< HEAD
                'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm ' +
                className
            }
            ref={input}
=======
                'rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 ' +
                className
            }
            ref={localRef}
>>>>>>> teste
=======
                'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm ' +
                className
            }
            ref={input}
>>>>>>> teste
        />
    );
});
