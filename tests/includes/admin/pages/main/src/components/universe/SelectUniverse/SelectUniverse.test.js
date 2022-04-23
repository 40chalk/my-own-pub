import React from "react";
import {render, screen} from "@testing-library/react";
import SelectUniverse from "../../../../../../../../../includes/admin/pages/main/src/components/universe/SelectUniverse/SelectUniverse";
import '@testing-library/jest-dom'
import {WorksContextProvider} from "../../../../../../../../../includes/admin/pages/main/src/store/works-context";


describe('<SelectUniverse />', () => {
    test('SelectUniverse render', () => {
        render(<SelectUniverse />)
        const label = screen.getByText(/Select Universe/i, {exact: false})
        expect(label).toBeInTheDocument()
    })

    test('SelectUniverse Selector', async () => {
        render(<SelectUniverse />, {wrapper: WorksContextProvider})
        const selectBox = await screen.findByRole('option')
        await expect(selectBox).toBeInTheDocument()
    })
})