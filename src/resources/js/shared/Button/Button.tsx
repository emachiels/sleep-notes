import React, { ButtonHTMLAttributes, FC, PropsWithChildren } from 'react';
import clsx from 'clsx';
import './button.scss';
import { Variant } from '../types/Variant';

export interface ButtonProps extends PropsWithChildren<ButtonHTMLAttributes<HTMLButtonElement>>{
    loading?: boolean;
    variant?: Variant;
}

export const Button: FC<ButtonProps> = ({
    className,
    children,
    variant,
    ...rest
}) => {
    return (
        <button
            className={clsx(
                'button',
                variant && `button--${variant}`,
                className
            )}
            {...rest}
        >
            {children}
        </button>
    );
}
