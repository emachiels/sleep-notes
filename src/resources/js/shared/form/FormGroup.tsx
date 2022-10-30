import React, { FC, PropsWithChildren } from 'react';
import "./form-group.scss";

export const FormGroup: FC<PropsWithChildren> = ({
    children
}) => {
    return (
        <div className="form-group">
            {children}
        </div>
    );
}
