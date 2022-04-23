import {rest} from 'msw'

export const handlers = [
    rest.post("/wp-admin/admin-post.php?action=createUniverse", (req, res, ctx) => {
        return res(
            ctx.status(200)
        )
    }),

    rest.get("/wp-admin/admin-post.php?action=selectUniverse", (req, res, ctx) => {
        return res(
            ctx.json([
                {id: 1, name: 'Multi'}
            ])
        )
    })
]