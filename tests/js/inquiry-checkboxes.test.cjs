// Exercise the actual installed Livewire/Alpine checkbox handlers without a DOM dependency.
// The PHP suite separately verifies that every rendered group starts with array state.
const { test } = require('node:test');
const assert = require('node:assert/strict');
const { readFileSync } = require('node:fs');
const vm = require('node:vm');
const source = readFileSync('vendor/livewire/livewire/dist/livewire.js', 'utf8');
const functionSource = (start, end) => {
    const offset = source.indexOf(`  function ${start}(`);
    assert.ok(offset >= 0, `Installed Livewire must expose ${start}`);
    const boundary = source.indexOf(`  function ${end}(`, offset);
    assert.ok(boundary > offset);
    return source.slice(offset, boundary);
};
const context = vm.createContext({
    CustomEvent: class CustomEvent {},
    mutateDom: callback => callback(),
    isCheckbox: el => el.type === 'checkbox',
    isRadio: el => el.type === 'radio',
    checkedAttrLooseCompare: (a, b) => a == b,
    checkedAttrLooseCompare2: (a, b) => a == b,
});
vm.runInContext(functionSource('getInputValue', 'safeParseNumber') + functionSource('bindInputValue', 'bindClasses'), context);

function click(inputs, index, checked, state) {
    inputs[index].checked = checked;
    const result = context.getInputValue(inputs[index], [], { target: inputs[index] }, state);
    inputs.forEach(input => context.bindInputValue(input, result));
    return result;
}

test('initialized checkbox arrays support independent selection, multiple choices and deselection', () => {
    const inputs = ['Blog / novosti', 'Više jezika', 'Online rezervacije'].map(value => ({ type: 'checkbox', value, checked: false }));
    let state = click(inputs, 0, true, []);
    assert.deepEqual(Array.from(state), ['Blog / novosti']);
    assert.deepEqual(inputs.map(input => input.checked), [true, false, false]);
    state = click(inputs, 2, true, state);
    assert.deepEqual(Array.from(state), ['Blog / novosti', 'Online rezervacije']);
    assert.deepEqual(inputs.map(input => input.checked), [true, false, true]);
    state = click(inputs, 0, false, state);
    assert.deepEqual(Array.from(state), ['Online rezervacije']);
    assert.deepEqual(inputs.map(input => input.checked), [false, false, true]);
    // Livewire hydration / returning to Step 2 must render the same choices.
    const restored = JSON.parse(JSON.stringify(state));
    inputs.forEach(input => context.bindInputValue(input, restored));
    assert.deepEqual(inputs.map(input => input.checked), [false, false, true]);
});

test('undefined group state reproduces the original shared boolean selection', () => {
    const inputs = ['a', 'b', 'c'].map(value => ({ type: 'checkbox', value, checked: false }));
    const state = click(inputs, 0, true, undefined);
    assert.equal(state, true);
    assert.deepEqual(inputs.map(input => input.checked), [true, true, true]);
});
