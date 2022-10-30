import React, { ChangeEvent, FC, InputHTMLAttributes, PropsWithChildren, useId, useState } from 'react';
import clsx from 'clsx';
import "./form-control.scss";

export interface TextInputProps extends PropsWithChildren<Omit<InputHTMLAttributes<HTMLInputElement>, 'onChange'>> {
    onChange: (value: string) => void;
    inputClassName?: string;
}

export const TextInput: FC<TextInputProps> = ({
   id,
    type = 'text',
    onChange,
    className,
    inputClassName
}) => {
    id = id || useId();

    const [hasFocus, setHasFocus] = useState(false);

    const handleChange = (event: ChangeEvent<HTMLInputElement>) => {
        onChange(event.target.value)
    }

    return (
        <label
            htmlFor={id}
            className={clsx(
                'form-control-container',
                hasFocus && 'form-control-container--focus',
                className
            )}
        >
            <input
                type={type}
                id={id}
                onChange={handleChange}
                onFocus={() => setHasFocus(true)}
                onBlur={() => setHasFocus(false)}
                className={clsx(
                    'form-control',
                    inputClassName
                )}
            />
        </label>
    );
}
