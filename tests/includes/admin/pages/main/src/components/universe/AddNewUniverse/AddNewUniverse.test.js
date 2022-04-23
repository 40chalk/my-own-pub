import React from "react";
import {render, screen} from "@testing-library/react";
import AddNewUniverse
    from "../../../../../../../../../includes/admin/pages/main/src/components/universe/AddNewUniverse/AddNewUniverse";

describe('<AddNewUniverse />', () => {
    test('render', () => {
        render(<AddNewUniverse/>)
        const label = screen.getByRole('textbox', {name: 'Universe'})
        expect(label).toBeInTheDocument()
    })
})