import React, { FC, PropsWithChildren } from 'react';
import "./setup-layout.scss";

export const SetupLayout: FC<PropsWithChildren> = ({
    children
}) => {
    return (
        <div className="setup-layout">
            <aside className="setup-layout-sidebar">

            </aside>
            <div className="setup-layout-content">
                {children}
            </div>
        </div>
    )
}
