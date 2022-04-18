import React, {useContext} from 'react';
import worksContext from "../../../store/works-context";

const SelectUniverse = () => {
    const ctx = useContext(worksContext)

    return (
        <div>
            <label htmlFor="universes">Select Universe</label>
            <select name="universes" onChange={ctx.onSelectUniverse}>
                {ctx.works && ctx.works.map(universe => <option value={universe.id}>{universe.name}</option>)}
            </select>
        </div>
    );
};

export default SelectUniverse;