import React, { FC, LabelHTMLAttributes, PropsWithChildren } from 'react';

export type FormLabelProps = LabelHTMLAttributes<HTMLLabelElement>;

export const FormLabel: FC<PropsWithChildren<FormLabelProps>> = ({
    children,
    htmlFor
}) => {
    return (
        <label htmlFor={htmlFor}>
            {children}
        </label>
    );
}
